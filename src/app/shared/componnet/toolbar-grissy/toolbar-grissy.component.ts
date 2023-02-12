import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {MenuItem} from 'primeng/api';

@Component({
  selector: 'app-toolbar-grissy',
  templateUrl: './toolbar-grissy.component.html',
  styleUrls: ['./toolbar-grissy.component.css']
})
export class ToolbarGrissyComponent  implements OnInit{

  items: MenuItem[] = [
    {label: 'Perfil', icon: 'pi pi-user', command: () => {
      }
    },
    // {label: 'Configuracion', icon: 'pi pi-cog', command: () => {
    //   },
    // },
    {separator: true},
    {label: 'Salir', icon: 'pi pi-sign-in', routerLink: ['/login'],command: () => {
      localStorage.clear();
    },}
  ];

  barramenu: MenuItem[] = [
    {
      label: 'Administracion',
      icon: 'pi pi-box',
      escape: false,
      items: [
        {
          label: 'Productos',
          escape: false,
          icon: 'pi pi-box',
          routerLink: ['/mydp/administracion/productos'],command: () => {  this.visibleSidebar1 = false;}
        },
        {
          label: 'Tallas',
          escape: false,
          icon: 'pi pi-box',
          routerLink: ['/mydp/administracion/tallas'],command: () => {  this.visibleSidebar1 = false;}
        },
        {
          label: 'Areas',
          escape: false,
          icon: 'pi pi-box',
          routerLink: ['/mydp/administracion/areas'],command: () => {  this.visibleSidebar1 = false;}
        },
        {
          label: 'Marcas',
          escape: false,
          icon: 'pi pi-box',
          routerLink: ['/mydp/administracion/marcas'],command: () => {  this.visibleSidebar1 = false;}
        }
      ]
    },
    {
      label: 'Usuarios',
      icon: 'pi pi-user',
      escape: false,
      items: [
        {
          label: 'Empleados',
          escape: false,
          icon: 'pi pi-user',
          routerLink: ['/mydp/usuarios/empleados'],command: () => {  this.visibleSidebar1 = false;}
        },
      ]
    },
    {
      label: 'Anuncios',
      icon: 'pi pi-images',
      escape: false,
      routerLink: ['/mydp/anuncios'],command: () => {  this.visibleSidebar1 = false;}
    },
  ];

  visibleSidebar1 = false;



  constructor() {}

  ngOnInit( ): void {

  }



}
