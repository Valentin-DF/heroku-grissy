import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class HomeService {
  constructor(private http: HttpClient) { }

  ultimoCabaleros(): any {
    return this.http.get('http://localhost:8080/b_grissy/controllers/mostrar/ultimocaballeros.php');
  }

  ultimoDamas(): any {
    return this.http.get('http://localhost:8080/b_grissy/controllers/mostrar/ultimodamas.php');
  }

  ultimoNiños(): any {
    return this.http.get('http://localhost:8080/b_grissy/controllers/mostrar/ultimoninos.php');
  }

  ultimoInteriores(): any {
    return this.http.get('http://localhost:8080/b_grissy/controllers/mostrar/ultimointeriores.php');
  }

}
