import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GToolBarGrissyModule } from './componnet/toolbar-grissy/toolbar-grissy.module';
import { GToolBarPrincipalModule } from './componnet/toolbar-principal/tollbar-principal.module';
import { GTableGrissyModule } from './componnet/table-grissy/table-grissy.module';
import { DialogModule } from 'primeng/dialog';
import { ButtonModule } from 'primeng/button';
import { ToastModule } from 'primeng/toast';
import { PanelMenuModule } from 'primeng/panelmenu';
import { GAutocompleteGrissyModule } from './componnet/autocomplete-grissy/autocomplete-grissy.module';
import { ImageModule } from 'primeng/image';
import { InputNumberModule } from 'primeng/inputnumber';
import { GFooterPrincipalModule } from './componnet/footer-principal/footer-principal.module';
import { CarouselModule } from 'primeng/carousel';
import { CardModule } from 'primeng/card';
import {MessagesModule} from 'primeng/messages';
import {MessageModule} from 'primeng/message';
import {MatTabsModule} from '@angular/material/tabs';

import {GMapModule} from 'primeng/gmap';
import { PaginatorModule } from 'primeng/paginator';

@NgModule({
  declarations: [
  ],
  imports: [
    CommonModule,
  ],
  exports: [
    GToolBarGrissyModule,
    GToolBarPrincipalModule,
    GFooterPrincipalModule,
    GTableGrissyModule,
    GAutocompleteGrissyModule,
    DialogModule,
    ButtonModule,
    ToastModule,
    PanelMenuModule,
    ImageModule,
    InputNumberModule,
    CarouselModule,
    CardModule,
    MessagesModule,
    MessageModule,
    MatTabsModule,
    GMapModule,
    PaginatorModule
  ]
})
export class SharedModule { }
