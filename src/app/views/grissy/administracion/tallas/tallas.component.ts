import { Component, OnInit } from '@angular/core';
import { TallasService } from './tallas.service';
import { SkeletonTable, SkeletonForm } from '../../../../shared/componnet/table-grissy/table-grissy.interface';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-tallas',
  templateUrl: './tallas.component.html',
  styleUrls: ['./tallas.component.scss'],
  providers:[
    TallasService
  ]
})
export class TallasComponent {

  abrirModal = false;
	submitted = false;
  isEditar = false;

  summitted = false;

  form: FormGroup = this.formBuilder.group({
    id:[],
    codigo: ['', Validators.required],
    nombre: ['']
  });
  colsTable: SkeletonTable[]= [
    { field: 'codigo', label: 'CODIGO' },
    { field: 'nombre', label: 'NOMBRE',   },
    { field: 'habilitado', label: 'habilitado', ftype: 'checkbox'},
  ];

  constructor( private sv: TallasService, private formBuilder:FormBuilder) {
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

  guardadito(table: any): void {
    this.summitted = true;
    if(this.form.invalid){
      return;
    }
      table.guardar(this.form);
      this.abrirModal = false;
  }
}
