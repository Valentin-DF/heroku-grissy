import { Injectable } from "@angular/core";
import { LocalStorage_Grissy } from "./local-storage";
@Injectable({
  providedIn: 'root'
})
export class ServicesFunction {

 inLoggerIn(): boolean {

    const token_exp = localStorage.getItem(LocalStorage_Grissy.LS_TOKEN_EXPIRE);
    const token = localStorage.getItem(LocalStorage_Grissy.LS_TOKEN);

    if(token_exp== undefined && token == undefined){
      return false;
    }

    let unixTimestamp  = JSON.parse(token_exp!);

    const fechatoken =  new Date(unixTimestamp * 1000);
    const fechaactual = new Date();

    if(fechatoken < fechaactual){
      return false;
    }

    return true;
  }
}
