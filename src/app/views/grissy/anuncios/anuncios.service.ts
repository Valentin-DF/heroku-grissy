import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class AnunciosService {
  constructor(private http: HttpClient) { }

  buscarInformacion(id: any): any {
    return this.http.get(`http://localhost:8080/b_grissy/controllers/buscar/anuncios.php`,{
      params:{
        id: id,
      }
    })
  }

}
