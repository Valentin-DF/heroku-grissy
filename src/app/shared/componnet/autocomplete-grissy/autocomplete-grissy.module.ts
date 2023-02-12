import { NgModule } from '@angular/core';

import { CommonModule } from '@angular/common';
import { AutocompleteGrissyComponent } from './autocomplete-grissy.component';
import { AutoCompleteModule } from 'primeng/autocomplete';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [AutocompleteGrissyComponent],
  imports: [
    CommonModule,
    FormsModule,
    AutoCompleteModule
  ],
  exports: [AutocompleteGrissyComponent],

})
export class GAutocompleteGrissyModule {}
