import { HttpClient, HttpParams } from '@angular/common/http';
import { EventEmitter, Injectable } from '@angular/core';
import { stringify } from 'qs';
import { Observable, Subject } from 'rxjs';
import { distinctUntilChanged, switchMap, tap } from 'rxjs/operators';
import { FinderSearchStatus } from './automplete.export';
import { SearchResult } from './ns-finder.interface';



@Injectable({
  providedIn: 'root'
})
export class AutocompleteService {

  /** Items if not dynamic content */
  get searchResult(): Observable<SearchResult[]> {
    return this.search$.pipe(
      //debounceTime(300),
      distinctUntilChanged(),
      switchMap(({ path, params }) => {

        // Set loading status
        this.status.emit(FinderSearchStatus.LOADING);

        return this.http
          .get<SearchResult[]>(path, {
            params: new HttpParams({
              fromString: stringify(params, { arrayFormat: 'brackets' }),
            })
          })
          .pipe(
            tap({
              complete: () => this.status.emit(FinderSearchStatus.DONE),
              error: () => this.status.emit(FinderSearchStatus.ERROR)
            })
          );
      })
    );
  }

  /** Estado del servicio de busqueda */
  public status = new EventEmitter<FinderSearchStatus>();


  private search$ = new Subject<{ path: string; params: Record<string, any> }>();

  constructor(private readonly http: HttpClient) { }

  public search(path: string, params: Record<string, any>): void {
    this.search$.next({ path, params });
  }
}
