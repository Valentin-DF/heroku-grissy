import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AreasComponent } from './administracion/areas/areas.component';
import { ProductosComponent } from './administracion/productos/productos.component';
import { TallasComponent } from './administracion/tallas/tallas.component';
import { EmpleadosComponent } from './usuarios/empleados/empleados.component';
import { AnunciosComponent } from './anuncios/anuncios.component';
import { MarcasComponent } from './administracion/marcas/marcas.component';
import { ModuleGuard } from 'src/app/shared/guards/guards.guards';

const routes : Routes = [
      {
        path:'',
        component: HomeComponent,
        canActivateChild: [ModuleGuard],
      },
      {
        path: 'administracion',
        canActivateChild: [ModuleGuard],
        children: [
          {
            path: 'areas',
            component: AreasComponent,
          },
          {
            path: 'productos',
            component: ProductosComponent
          },
          {
            path: 'tallas',
            component:TallasComponent
          },
          {
            path: 'marcas',
            component:MarcasComponent
          },
        ]
      },
      {
        path: 'usuarios',
        canActivateChild: [ModuleGuard],
        children: [
          {
            path: 'empleados',
            component: EmpleadosComponent
          },
        ]
      },
      {
        path: 'anuncios',
        canActivateChild: [ModuleGuard],
        component: AnunciosComponent
      }
]

@NgModule({
  imports: [RouterModule.forChild(routes)],
})
export class GrissyRoutingModule { }
