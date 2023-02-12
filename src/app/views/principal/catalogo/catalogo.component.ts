import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';

@Component({
  selector: 'app-catalogo',
  templateUrl: './catalogo.component.html',
  styleUrls: ['./catalogo.component.scss']
})
export class CatalogoComponent implements OnInit {

  constructor(private rutaActiva: ActivatedRoute) { }
  marca: any;

  ngOnInit(): void {

    this.rutaActiva.queryParams.subscribe(
      (params: any) => {
        this.marca = params.d;
      }
    );
  }

  paginate(e: any): void {

  }

}
