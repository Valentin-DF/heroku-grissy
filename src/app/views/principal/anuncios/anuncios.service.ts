import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class AnunciosHService {
  constructor(private http: HttpClient) { }

  anuncios(numero: any): any {
    return this.http.get(`http://localhost:8080/b_grissy/controllers/mostrar/anuncios.php`,{
      params:{
        setin: numero,
      }
    })
  }

}
