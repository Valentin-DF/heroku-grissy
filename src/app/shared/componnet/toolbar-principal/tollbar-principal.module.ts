import { NgModule } from '@angular/core';
import { ToolbarPrincipalComponent } from './toolbar-principal.component';

import { ButtonModule } from 'primeng/button';
import { ToolbarModule } from 'primeng/toolbar';
import { SplitButtonModule } from 'primeng/splitbutton';
import { SidebarModule } from 'primeng/sidebar';
import { PanelMenuModule } from 'primeng/panelmenu';
import { MenubarModule } from 'primeng/menubar';
import { CommonModule } from '@angular/common';
import {MegaMenuModule} from 'primeng/megamenu';
import {MenuModule} from 'primeng/menu';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
@NgModule({
  declarations: [ToolbarPrincipalComponent],
  imports: [
    CommonModule,
    ButtonModule,
    ToolbarModule,
    SplitButtonModule,
    SidebarModule,
    PanelMenuModule,
    MenubarModule,
    MegaMenuModule,
    MenuModule,
    NgbModule
  ],
  exports: [ToolbarPrincipalComponent],
  providers: []

})
export class GToolBarPrincipalModule {}
