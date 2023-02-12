import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { SkeletonTable } from 'src/app/shared/componnet/table-grissy/table-grissy.interface';
import { SkeletonForm } from 'src/app/shared/componnet/table-grissy/table-grissy.interface';
import { AnunciosService } from './anuncios.service';

@Component({
  selector: 'app-anuncios',
  templateUrl: './anuncios.component.html',
  styleUrls: ['./anuncios.component.scss']
})
export class AnunciosComponent {

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
    nombre: ['', Validators.required],
    fecha_inicio: ['', Validators.required],
    fecha_final: ['', Validators.required],
    url_imagen: ['', Validators.required],
    descripcion: [''],
  });

  colsTable: SkeletonTable[]= [
    { field: 'codigo', label: 'CODIGO', },
    { field: 'nombre', label: 'NOMBRE', },
    { field: 'fecha_inicio', label: 'FECHA INICIO',ftype: 'date'},
    { field: 'fecha_final', label: 'FECHA FINAL', ftype: 'date' },
    { field: 'habilitado', label: 'HABILITADO',ftype: 'checkbox'},
  ];

  constructor( private formBuilder:FormBuilder, private sv:AnunciosService ) {
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

  guardadito(table: any): void {
    this.summitted = true;
    if(this.form.invalid){
      return;
    }
      table.guardar(this.form);
      this.abrirModal = false;
  }
}
