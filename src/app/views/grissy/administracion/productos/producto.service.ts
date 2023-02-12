import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class ProductosService {
  constructor(private http: HttpClient) { }

  buscarInformacion(id: any): any {
    return this.http.get(`http://localhost:8080/b_grissy/controllers/buscar/producto.php`,{
      params:{
        id: id,
      }
    })
  }

}
