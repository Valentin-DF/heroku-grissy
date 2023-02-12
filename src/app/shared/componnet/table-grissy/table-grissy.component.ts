import { Component, EventEmitter, Input, OnInit, Output, ViewChild } from '@angular/core';
import * as FileSaver from 'file-saver';
import { TableService } from './table-grissy.service';
import { SkeletonTable, SkeletonForm } from './table-grissy.interface';
import { Table } from 'primeng/table';

@Component({
  selector: 'app-table-grissy',
  templateUrl: './table-grissy.component.html',
  styleUrls: ['./table-grissy.component.scss']
})
export class TableGrissyComponent implements OnInit{
  @ViewChild('dt')
  dt!: Table;

  @Output() modal = new EventEmitter<any>();



  @Input() baseURL: string = '';
  @Input() colsTable: SkeletonTable[] = [];
  @Input() dataTraida: any= {}

  lista: any ;
  _selectedColumns:  any
  selectedProducts: any
  list: any;

  abrirmodal = false;

  headers = {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'};
  isEditar = false;

  uploadedFiles: any[] = [];
  nombreImagen: any;
  limite: any;
  img: any

  results: any;

  constructor( private sv: TableService ) { }

  ngOnInit(): void {
    this.listarTabla();
  }

  eliminarFila(data:  any): void {
    this.sv.eliminarFila(this.baseURL,data.id).subscribe((r: any) =>{
      if(r = true){
        this.lista.pop();
        this.listarTabla();
      }
    });
  }

  estadoFila(data: any,estado: any):void{
    for( const d of data){
    this.sv.EstadoData(this.baseURL,d.id,estado).subscribe((r: any) =>{
      if(r === true){
        this.lista.pop();
        this.listarTabla();
      }
    });
  }
  this.list = [];
  }

  eliminarSeleccionados(data: any): void{
    for( const d of data){
      this.sv.eliminarFila(this.baseURL,d.id).subscribe((r: any) =>{
        if(r === true){
          this.lista.pop();
          this.listarTabla();
        }
      });
    }
    this.list = [];
  }

  listarTabla(): void {
    this.sv.listarTabla(this.baseURL).subscribe((r: any) =>{
      let conteo = 1;
      for(const d of r){

        d.index =conteo;
        conteo++;
      }
      this.lista = r;
      this._selectedColumns = this.colsTable;
    });
  }

  @Input() get selectedColumns(): any[] {
    return this._selectedColumns;
  }

  set selectedColumns(val: any[]) {
      this._selectedColumns = this.colsTable.filter(col => val.includes(col));
  }

  busqueda($event: any, stringVal: any): void {
    if ($event !== null) {
      this.dt.filterGlobal(($event.target as HTMLInputElement).value, stringVal);
    } else {
      this.dt.filterGlobal('', stringVal);
    }
  }

  exportExcel() {
    import('xlsx').then(xlsx => {
      let worksheet;
      if(this.list === undefined ||this.list.length === 0 ){
        worksheet = xlsx.utils.json_to_sheet(this.lista);

      }else{
        worksheet = xlsx.utils.json_to_sheet(this.list);
      }
      const workbook = { Sheets: { data: worksheet }, SheetNames: ["data"] };
      const excelBuffer: any = xlsx.write(workbook, {
        bookType: "xlsx",
        type: "array"
      });
      this.saveAsExcelFile(excelBuffer, "products");
    });
  }

  saveAsExcelFile(buffer: any, fileName: string): void {
      let EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
      let EXCEL_EXTENSION = '.xlsx';
      const data: Blob = new Blob([buffer], {
          type: EXCEL_TYPE
      });
      FileSaver.saveAs(data, fileName + '_export_' + new Date().getTime() + EXCEL_EXTENSION);
  }

  guardar(form: any): void {
    // if(form.invalid){
    //   return false;
    // }else{
      if( this.isEditar ===  true){
        this.sv.editarData(this.baseURL,form.value,this.headers).subscribe((r: any) =>{
          if(r === true){
            this.lista.pop();
            this.listarTabla();
          }
        });
      }else{
        this.sv.guardarData(this.baseURL,form.value,this.headers).subscribe((r: any) =>{
          if(r === true){
            this.lista.pop();
            this.listarTabla();
          }
        });
      }
      this.list = [];
    //   return true;
    // }
  }

  cargarArchivo(event: any): any {
    const condicion = document.getElementById('condicion');
    const archivoCapturado = event.target.files[0];
    if (event.target.files[0].size < 3145728) {
      this.nombreImagen = event.target.files[0].name;
      this.extraerBase64(archivoCapturado).then((imagen: any) => {
        // this.form.patchValue({ url_imagen: imagen.base });
      });
      this.limite = ' Imagen Permitida';
      if (condicion != null) { condicion.style.color = 'green'; }
    } else {
      this.limite = ' Tamaño Maximo 3MB';
      this.nombreImagen = '';
      if (condicion != null) { condicion.style.color = 'red'; }
    }
  }

  extraerBase64: any = async ($event: any) => new Promise((resolve, reject) => {
    try {
      const unsafeIng = window.URL.createObjectURL($event);
      const reader = new FileReader();
      reader.readAsDataURL($event);
      this.img = reader.onload = (e): any => {
        resolve({
          base: reader.result
        });
      };
      return unsafeIng;

    } catch (e) {
      return null;
    }
  });


  abrirModal1(): void{
    this.isEditar =  false;
    const dat_modal = {
        id: null,
        isEditar: false,
        abrirModal: true
      };
      this.modal.emit(dat_modal);
    }

  abrirModal2(data: any): void{



    if( data != undefined && data.length === 1){
      this.isEditar =  true;
      const dat_modal = {
        id:  data[0].id,
        isEditar: true,
        abrirModal: true
      };
      this.modal.emit(dat_modal);
    }
    if( data != undefined && data.length > 1 ){
      const  dat_modal = {
        abrirModal: false
      };
      this.modal.emit(dat_modal);
      alert('no se puede editar varios documentos a la vez!');
      this.list= [];
    }
  }



}
