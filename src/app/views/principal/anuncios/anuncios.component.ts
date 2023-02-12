import { Component, OnInit } from '@angular/core';
import { AnunciosHService } from './anuncios.service';

@Component({
  selector: 'app-anuncios',
  templateUrl: './anuncios.component.html',
  styleUrls: ['./anuncios.component.scss']
})
export class AnunciosComponent implements OnInit {

  totalRow: any;
  data:any = [] ;

  constructor(private sv:AnunciosHService){}

  ngOnInit(): void {
    this.sv.anuncios(0).subscribe((d: any) => {
      this.data  = d.data;
      this.totalRow = d.totalRow;
    })
  }

  paginate(e: any): void {
    this.sv.anuncios(e.first).subscribe((d: any) => {
      this.data  = d.data;
      this.totalRow = d.totalRow;
    })
  }

}
