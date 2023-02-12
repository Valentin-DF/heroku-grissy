import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { LocalStorage_Grissy } from 'src/app/shared/static/local-storage';
import { ServicesFunction } from 'src/app/shared/static/services';
import { LoginService } from './login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  header= {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'};
  form: FormGroup = this.formBuilder.group({
    email: ['', Validators.required],
    contrasena: ['', Validators.required]
  });

  constructor(private sv: LoginService, private formBuilder:FormBuilder,private router: Router, private sf: ServicesFunction) { }

    ngOnInit(): void {
      if (this.sf.inLoggerIn()==true){
        this.router.navigateByUrl("/mydp", { skipLocationChange: true });
      }
    }

  login(): void{
    this.sv.loggiarUsuario(this.form.value,this.header).subscribe((r: any) =>{
      localStorage.setItem(LocalStorage_Grissy.LS_ID_USUARIO,r.id);
      localStorage.setItem(LocalStorage_Grissy.LS_CODIGO_USUARIO,r.codigo);
      localStorage.setItem(LocalStorage_Grissy.LS_USUARIO,r.nombre);
      localStorage.setItem(LocalStorage_Grissy.LS_EMAIL_USUARIO,r.email);
      localStorage.setItem(LocalStorage_Grissy.LS_TOKEN,r.token);
      localStorage.setItem(LocalStorage_Grissy.LS_FOTO_USUARIO,r.url_imagen);
      localStorage.setItem(LocalStorage_Grissy.LS_TOKEN_EXPIRE,r.token_exp);
      this.router.navigateByUrl("/mydp", { skipLocationChange: true });
    });
  }

}
