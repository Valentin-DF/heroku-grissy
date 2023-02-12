import { NgModule } from '@angular/core';

import { ButtonModule } from 'primeng/button';
import { ToolbarModule } from 'primeng/toolbar';
import { SplitButtonModule } from 'primeng/splitbutton';
import { SidebarModule } from 'primeng/sidebar';
import { PanelMenuModule } from 'primeng/panelmenu';
import { MenubarModule } from 'primeng/menubar';
import { CommonModule } from '@angular/common';
import { FooterPrincipalComponent } from './footer-principal.component';
import {MatDividerModule} from '@angular/material/divider';

@NgModule({
  declarations: [FooterPrincipalComponent],
  imports: [
    CommonModule,
    ButtonModule,
    ToolbarModule,
    SplitButtonModule,
    SidebarModule,
    PanelMenuModule,
    MenubarModule,
    MatDividerModule
  ],
  exports: [FooterPrincipalComponent],
  providers: []

})
export class GFooterPrincipalModule {}
