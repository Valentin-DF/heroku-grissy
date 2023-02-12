import { Component } from '@angular/core';

@Component({
  selector: 'app-footer-principal',
  templateUrl: './footer-principal.component.html',
  styleUrls: ['./footer-principal.component.scss']
})
export class FooterPrincipalComponent {
  year = new Date().getFullYear();

}
