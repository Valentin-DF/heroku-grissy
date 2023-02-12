import {  Component, ElementRef, HostListener, OnInit, ViewChild } from '@angular/core';
import { HomeService } from './home.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  @ViewChild('interno')
  interno!: ElementRef;
  estado: any = 'abierto';
  options = {
    center: {lat: 36.890257, lng: 30.707417},
    zoom: 12
  };

  responsiveOptions = [
    {
      breakpoint: '1500px',
      numVisible: 4,
      numScroll: 3
    },
    {
        breakpoint: '1200px',
        numVisible: 3,
        numScroll: 3
    },
    {
        breakpoint: '910px',
        numVisible: 2,
        numScroll: 2
    },
    {
        breakpoint: '560px',
        numVisible: 1,
        numScroll: 1
    }
];


caballeros = [];
damas = [];
ninos = [];
interior = [];

imgCollection: Array<object> = [
  {
    image: 'https://loremflickr.com/g/600/400/paris',
    thumbImage: 'https://loremflickr.com/g/1200/800/paris',
    alt: 'Image 1',
    title: 'Image 1'
  }
];

constructor(private sv: HomeService) {

}

ngOnInit(): void {
  this.sv.ultimoCabaleros().subscribe((r: any) => {
    this.caballeros = r;
  });
  this.sv.ultimoDamas().subscribe((r: any) => {
    this.damas = r;
  });
  this.sv.ultimoNiños().subscribe((r: any) => {
    this.ninos = r;
  });
  this.sv.ultimoInteriores().subscribe((r: any) => {
    this.interior = r;
  });
}

}
