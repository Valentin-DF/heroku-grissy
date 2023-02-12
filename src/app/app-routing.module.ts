import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeContainerComponent } from './views/principal/home-container/home-container.component';
import { GrissyContainerComponent } from './views/grissy/grissy-container/grissy-container.component';
import { LoginComponent } from './views/grissy/login/login.component';
import { ModuleGuard } from './shared/guards/guards.guards';



const routes: Routes = [
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: 'mydp',
    component: GrissyContainerComponent,
    canActivate: [ModuleGuard],
    children: [
      {
        path: '',
        loadChildren: () => import('./views/grissy/grissy.module').then(m => m.GrissyModule),
      }
    ],
    canLoad: [ModuleGuard]
  },
  {
    path: '',
    component: HomeContainerComponent,
    children: [
      {
        path: '',
        loadChildren: () => import('./views/principal/principal.module').then(m => m.PrincipalModule),
      }
    ]
  },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
