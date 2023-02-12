import { NgModule } from '@angular/core';
import { ToolbarGrissyComponent } from './toolbar-grissy.component';

import { ButtonModule } from 'primeng/button';
import { ToolbarModule } from 'primeng/toolbar';
import { SplitButtonModule } from 'primeng/splitbutton';
import { SidebarModule } from 'primeng/sidebar';
import { PanelMenuModule } from 'primeng/panelmenu';
import { MenubarModule } from 'primeng/menubar';
import { CommonModule } from '@angular/common';

@NgModule({
  declarations: [ToolbarGrissyComponent],
  imports: [
    CommonModule,
    ButtonModule,
    ToolbarModule,
    SplitButtonModule,
    SidebarModule,
    PanelMenuModule,
    MenubarModule,
  ],
  exports: [ToolbarGrissyComponent],
  providers: []

})
export class GToolBarGrissyModule {}
