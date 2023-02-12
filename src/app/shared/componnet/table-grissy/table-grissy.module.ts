import { NgModule } from '@angular/core';

import { ButtonModule } from 'primeng/button';
import { ToolbarModule } from 'primeng/toolbar';
import { SplitButtonModule } from 'primeng/splitbutton';
import { SidebarModule } from 'primeng/sidebar';
import { PanelMenuModule } from 'primeng/panelmenu';
import { MenubarModule } from 'primeng/menubar';
import { CommonModule } from '@angular/common';
import { TableGrissyComponent } from './table-grissy.component';
import { TableModule } from 'primeng/table';
import { SliderModule } from 'primeng/slider';
import { DialogModule } from 'primeng/dialog';
import { MultiSelectModule } from 'primeng/multiselect';
import { ContextMenuModule } from 'primeng/contextmenu';
import { DropdownModule } from 'primeng/dropdown';
import { ToastModule } from 'primeng/toast';
import { InputTextModule } from 'primeng/inputtext';
import { ProgressBarModule } from 'primeng/progressbar';
import { FileUploadModule } from 'primeng/fileupload';
import { RatingModule } from 'primeng/rating';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { RadioButtonModule } from 'primeng/radiobutton';
import { InputNumberModule } from 'primeng/inputnumber';
import { ConfirmDialogModule } from 'primeng/confirmdialog';
import { InputTextareaModule } from 'primeng/inputtextarea';
import { HttpClientModule } from '@angular/common/http';
import {CheckboxModule} from 'primeng/checkbox';
import {MessageModule} from 'primeng/message';
import { CalendarModule } from 'primeng/calendar';
import { ImageModule } from 'primeng/image';
import { AutoCompleteModule } from 'primeng/autocomplete';
import { PasswordModule } from "primeng/password";
import { GAutocompleteGrissyModule } from '../autocomplete-grissy/autocomplete-grissy.module';

@NgModule({
  declarations: [TableGrissyComponent],
  imports: [
    CommonModule,
    ButtonModule,
    ToolbarModule,
    SplitButtonModule,
    SidebarModule,
    PanelMenuModule,
    MenubarModule,
    TableModule,
		SliderModule,
		DialogModule,
		MultiSelectModule,
		ContextMenuModule,
		DropdownModule,
		ToastModule,
    InputTextModule,
    ProgressBarModule,
    FileUploadModule,
    RatingModule,
    FormsModule,
    RadioButtonModule,
    InputNumberModule,
    ConfirmDialogModule,
    InputTextareaModule,
    HttpClientModule,
    CheckboxModule,
    MessageModule,
    FormsModule,
    ReactiveFormsModule,
    CalendarModule,
    ImageModule,
    DropdownModule,
    AutoCompleteModule,
    PasswordModule,
    GAutocompleteGrissyModule
  ],
  exports: [TableGrissyComponent],
  providers: []

})
export class GTableGrissyModule {}
