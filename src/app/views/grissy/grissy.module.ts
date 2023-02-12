import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { HttpClientModule } from '@angular/common/http';
import { SharedModule } from '../../shared/shared.module';
import { GrissyRoutingModule } from './grissy-routing.module';

import { HomeComponent } from './home/home.component';

import { ProductosComponent } from './administracion/productos/productos.component';
import { TallasComponent } from './administracion/tallas/tallas.component';
import { AreasComponent } from './administracion/areas/areas.component';
import { EmpleadosComponent } from './usuarios/empleados/empleados.component';
import { AnunciosComponent } from './anuncios/anuncios.component';
import { LoginComponent } from './login/login.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MarcasComponent } from './administracion/marcas/marcas.component';
import { ModuleGuard } from 'src/app/shared/guards/guards.guards';


@NgModule({
  declarations: [
    LoginComponent,
    HomeComponent,
    ProductosComponent,
    TallasComponent,
    AreasComponent,
    EmpleadosComponent,
    AnunciosComponent,
    MarcasComponent,
  ],
  imports: [
    CommonModule,
    SharedModule,
    GrissyRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule

  ],
  providers: [ModuleGuard]
})
export class GrissyModule { }
