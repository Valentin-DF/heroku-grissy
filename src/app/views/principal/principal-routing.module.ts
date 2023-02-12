import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CatalogoComponent } from './catalogo/catalogo.component';
import { HomeComponent } from './home/home.component';
import { AnunciosComponent } from './anuncios/anuncios.component';


const routes : Routes = [
  {
    path: '',
    component:  HomeComponent,
  },
  {
    path: 'catalogo',
    component: CatalogoComponent
  },
  {
    path: 'anuncios',
    component: AnunciosComponent
  }

]


@NgModule({
  imports: [RouterModule.forChild(routes)],
})
export class PrincipalRoutingModule { }
