import { Component, EventEmitter, forwardRef, Input, Optional, Output, OnInit, ChangeDetectionStrategy, ChangeDetectorRef, ElementRef, ViewChild } from '@angular/core';
import { AbstractControl, ControlContainer, ControlValueAccessor, UntypedFormControl, NG_VALUE_ACCESSOR } from '@angular/forms';
import { AutocompleteService } from './autocomplete-grissy.service';
import { FinderSearchStatus, SearchType } from './automplete.export';
import { SearchResult } from './ns-finder.interface';
import { nanoid } from 'nanoid';
import { map, takeUntil } from 'rxjs/operators';
import { Subject } from 'rxjs';
@Component({
  selector: 'app-autocomplete-grissy',
  templateUrl: './autocomplete-grissy.component.html',
  styleUrls: ['./autocomplete-grissy.component.css'],
  changeDetection: ChangeDetectionStrategy.OnPush,
  providers: [
    {
      provide: NG_VALUE_ACCESSOR,
      useExisting: forwardRef(() => AutocompleteGrissyComponent),
      multi: true,
    },    AutocompleteService,
  ]
})
export class AutocompleteGrissyComponent implements ControlValueAccessor,OnInit {
  @ViewChild('resultbox', { static: true }) resultBox!: ElementRef;
  @ViewChild('labelInput', { static: true }) labelInput!: ElementRef;
  @ViewChild('codeInput', { static: false }) codeInput!: ElementRef;


  @Input() controllerPath: string = '';

  @Input() formControlName: string = '';

  @Input() correlatedForm: UntypedFormControl | undefined; // TODO: mejora la busqueda de componente de dependencia,

  @Input() disabled?: boolean;

  @Input() id = nanoid();


  /** Search id data field */
  @Input() idKey = 'id';

  /** Search code data field */
  @Input() codeKey = 'code';

  /** Search label data field */
  @Input() labelKey = 'label';

  @Input() correlatedKey = this.idKey;

  @Input() locked = false;

  /** @Event On select code */
  @Output() selectCode = new EventEmitter<string>();

  /** @Event On select label/description */
  @Output() selectLabel = new EventEmitter<string>();

  /** @Event On select item code/label */
  @Output() selectChange = new EventEmitter<SearchResult | null>();

  @Input() set OnClear(funct: any) {
    if (funct) {
      this.descriptionValue = '';
      //funct('');
    }
  }

  public searchText = '';
  results: any[] = [];

  public selected: SearchResult | undefined;
  public codeValue = '';
  public descriptionValue: any;
  private isRemoteSource?: boolean;
  private selectDefault?: string;
  public showResult = false;
  public hoveredIndex = 0;
  private destroyTrigger$ = new Subject();
  public loading = false;

  public propagateChange = (_: any): void => { };
  public onTouched = (_: any): void => { };

  constructor(  @Optional() private controlContainer: ControlContainer,
                private readonly cdr: ChangeDetectorRef,
                private readonly el: ElementRef,
                private readonly sv:AutocompleteService, ){

  }
  ngOnInit(): void {
    this.isRemoteSource = !!this.controllerPath;

    this.sv
    .status
    .pipe(
      takeUntil(this.destroyTrigger$)
    )
    .subscribe(status => {
      this.loading = status === FinderSearchStatus.LOADING;
      this.cdr.detectChanges();
    });

    this.sv
      .searchResult
      .pipe(
        takeUntil(this.destroyTrigger$),
        map(result => (result ?? []).map(item => ({
          id: item[this.idKey] ?? nanoid(5),
          code: item[this.codeKey] ?? '',
          label: item[this.labelKey],
        })))
      )
      .subscribe(data => {
        this.results = data;

        if (undefined !== this.selectDefault) {
          const i = this.results.findIndex(it => String(it.id) === this.selectDefault);
          -1 !== i && this.onSelect(this.results[i]);
          this.selectDefault = void 0;
        }
        setTimeout(() => {
          this.highlightSearch(this.searchText);
          this.cdr.detectChanges();
        }, 0);
      });
  }

  private highlightSearch(text: string): void {
    // text = text.trim();
    // if (text.length > 1) {
    //   const nodes: HTMLElement[] = [].slice.call(this.resultBox.nativeElement.querySelectorAll('.result-item .label'));
    //   nodes.forEach(el => {
    //     el.innerHTML = el.innerText.replace(new RegExp(escapeRegExp(text), 'gi'), m => `<mark class="px-0">${m}</mark>`);
    //   });
    // }
  }

  get currentControl(): AbstractControl | undefined {
    return this.controlContainer?.control?.get(this.formControlName) ?? void 0;
  }

  get hasError(): boolean {
    return !!this.currentControl?.errors;
  }

  getId(): string {
    return this.id;
  }

  descriptionSearch(event: any): void {
    this.search(event?.query);
  }

  onSelect(item: any): void {
    this.selected = item;
    this.codeValue = item.code;
    this.descriptionValue = item;
    this.searchText = '';

    this.selectChange.emit(this.selected);
    this.selectCode.emit(this.codeValue);
    this.selectLabel.emit(this.descriptionValue);

    this.propagateChange(item.id);

    this.hoveredIndex = -1;
    this.showResult = false;
    this.cdr.detectChanges();
  }

  clear(event: any): void {
    if (event.target.value === '') {
      this.propagateChange(null);
    }
  }

  private search(text: string): void {
    this.searchText = text;

    this.remoteSearch(text,'');
  }


  private remoteSearch(text: string, id?: any): void {

    this.sv.search(this.controllerPath, {
      'nombre': text,
      'id': id
    });
  }


  writeValue(value: any): void {
    value = String((value || null) ?? '');

    if (value.length > 0 && this.isRemoteSource && this.selectDefault !== value) {
      this.remoteSearch('',  value);

      this.selectDefault = value;

      return;
    }

  }

  selectedSuggest(name: any): void {
    this.descriptionValue = name.label;
  }



  registerOnChange(fn: any): void {
    this.propagateChange = fn;
  }
  registerOnTouched(fn: any): void {
    this.onTouched = fn;
  }
  setDisabledState?(isDisabled: boolean): void {
    this.disabled = isDisabled;
  }

}
