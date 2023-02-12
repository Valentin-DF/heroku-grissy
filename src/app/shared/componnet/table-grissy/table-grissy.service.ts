import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class TableService {
  constructor(private http: HttpClient) { }

    listarTabla(base: any): any {
        return this.http.get(`http://localhost:8080/b_grissy/controllers/listar${base}`);
    }

    eliminarFila(base: any,id: any): any {
      return this.http.get(`http://localhost:8080/b_grissy/controllers/eliminar${base}`,{
        params:{
          id: id,
        }
      })
    }

    buscarInformacion(base: any,id: any): any {
      return this.http.get(`http://localhost:8080/b_grissy/controllers/buscar${base}`,{
        params:{
          id: id,
        }
      })
    }


    guardarData(base: any,value: any,headers: any): any {
      return this.http.post(`http://localhost:8080/b_grissy/controllers/guardar${base}`, value,headers);
    }

    editarData(base: any,value: any,headers: any): any {
      return this.http.post(`http://localhost:8080/b_grissy/controllers/editar${base}`,value,headers);
    }

    EstadoData(base: any,id: any,estado: any): any {
      return this.http.get(`http://localhost:8080/b_grissy/controllers/estado${base}`, {
        params: {
          id: id,
          estado: estado
        }
      });
    }

}
