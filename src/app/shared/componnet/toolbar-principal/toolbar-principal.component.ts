import { Component, OnInit } from '@angular/core';
import { NavigationEnd, NavigationStart, Router } from '@angular/router';
import { MenuItem } from 'primeng/api';
import { Location, PopStateEvent } from '@angular/common';

@Component({
  selector: 'app-toolbar-principal',
  templateUrl: './toolbar-principal.component.html',
  styleUrls: ['./toolbar-principal.component.scss']
})
export class ToolbarPrincipalComponent implements OnInit {
//   items: MenuItem[] = [
//     {
//       label: 'NOVEDADES',
//       preserveFragment:true,routerLink: ['/#novedades']
//     },
//     {label: 'INICIO' },
//     {label: 'Calendar', icon: 'pi pi-fw pi-calendar'},
//     {label: 'Edit', icon: 'pi pi-fw pi-pencil'},
//     {label: 'Documentation', icon: 'pi pi-fw pi-file'},
//     {label: 'Settings', icon: 'pi pi-fw pi-cog'}
// ];
// }
 isCollapsed = true;
 lastPoppedUrl: string | undefined;
 yScrollStack: any = [];

constructor(public location: Location, private router: Router) {
}

ngOnInit(): void {
  this.router.events.subscribe((event) => {
    this.isCollapsed = true;
    if (event instanceof NavigationStart) {
       if (event.url != this.lastPoppedUrl)
        this.yScrollStack.push(window.scrollY);

   } else if (event instanceof NavigationEnd) {
       if (event.url == this.lastPoppedUrl) {
           this.lastPoppedUrl = undefined;
           window.scrollTo(0, this.yScrollStack.pop());
       } else
           window.scrollTo(0, 0);
   }
 });
 this.location.subscribe((ev: any) => {
     this.lastPoppedUrl = ev.url;
 });
}

isHome(): any {
    var titlee = this.location.prepareExternalUrl(this.location.path());

    if( titlee === '#/home' ) {
        return true;
    }
    else {
        return false;
    }
}
isDocumentation(): any {
    var titlee = this.location.prepareExternalUrl(this.location.path());
    if( titlee === '#/documentation' ) {
        return true;
    }
    else {
        return false;
    }
}

}
