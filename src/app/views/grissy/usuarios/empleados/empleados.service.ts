import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class EmpleadosService {
  constructor(private http: HttpClient) { }

  buscarInformacion(id: any): any {
    return this.http.get(`http://localhost:8080/b_grissy/controllers/buscar/empleado.php`,{
      params:{
        id: id,
      }
    })
  }

}
