import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class LoginService {
  constructor(private http: HttpClient) { }

    loggiarUsuario(value: any,header: any): any {
      return this.http.post('http://localhost:8080/b_grissy/controllers/usuario/login.php',value,header);
    }

}
