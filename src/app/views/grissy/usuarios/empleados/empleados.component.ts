import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { SkeletonTable,SkeletonForm } from 'src/app/shared/componnet/table-grissy/table-grissy.interface';
import { EmpleadosService } from './empleados.service';

@Component({
  selector: 'app-empleados',
  templateUrl: './empleados.component.html',
  styleUrls: ['./empleados.component.scss']
})
export class EmpleadosComponent {

  abrirModal = false;
	submitted = false;
  isEditar = false;


  uploadedFiles: any[] = [];
  nombreImagen: any;
  limite: any;
  img: any

  summitted = false;

  form: FormGroup = this.formBuilder.group({
    id:[],
    codigo: ['', Validators.required],
    nombre: [''],
    url_imagen: [''],
    email: ['', Validators.required],
    contrasena: ['', Validators.required],
  });

  colsTable: SkeletonTable[]= [
    { field: 'codigo', label: 'CODIGO' },
    { field: 'nombre', label: 'NOMBRE',   },
    { field: 'habilitado', label: 'habilitado', ftype: 'checkbox'},
  ];

  constructor( private formBuilder:FormBuilder, private sv:EmpleadosService ) {
  }

  get f() {return this.form.controls; }

  modal(e: any): void{

    this.isEditar = e.isEditar;
    if(e.abrirModal === true){
      this.abrirModal = true;
      if(e.isEditar === true){
        this.sv.buscarInformacion(e.id).subscribe((r: any) =>{
          for (const [key,value] of Object.entries(r)){
                  if(this.form.contains(key)){
                    this.form.patchValue({[key]: value})
                  }
                }
        });
      }
      if(e.isEditar === false){
        this.form.reset();
      }
    }

  }

  cargarArchivo(event: any): any {
    const condicion = document.getElementById('condicion');
    const archivoCapturado = event.target.files[0];
    if (event.target.files[0].size < 3145728) {
      this.nombreImagen = event.target.files[0].name;
      this.extraerBase64(archivoCapturado).then((imagen: any) => {
        this.form.patchValue({ url_imagen: imagen.base });
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

  guardadito(form: any,table: any): boolean {
    this.summitted = true;
    if(form.invalid){
      console.log(this.f);
      return false;
    }else{
      table.guardar(form);

      // if( this.isEditar ===  true){
      //   this.sv.editarData(this.baseURL,form.value,this.headers).subscribe((r: any) =>{
      //     if(r === true){
      //       this.lista.pop();
      //       this.listarTabla();
      //     }
      //   });
      // }else{
      //   this.sv.guardarData(this.baseURL,form.value,this.headers).subscribe((r: any) =>{
      //     if(r === true){
      //       this.lista.pop();
      //       this.listarTabla();
      //     }
      //   });
      // }
      // this.list = [];
      return true;
    }
  }

}
