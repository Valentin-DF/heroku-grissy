import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../../shared/shared.module';
import { PrincipalRoutingModule } from './principal-routing.module';
import { HomeComponent } from './home/home.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ModuleGuard } from 'src/app/shared/guards/guards.guards';
import { CatalogoComponent } from './catalogo/catalogo.component';
import { AnunciosComponent } from './anuncios/anuncios.component';



@NgModule({
  declarations: [
    HomeComponent,
    AnunciosComponent,
    CatalogoComponent
  ],
  imports: [
    CommonModule,
    SharedModule,
    PrincipalRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule

  ],
  providers: [ModuleGuard]
})
export class PrincipalModule { }
