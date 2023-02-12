import { Injectable} from '@angular/core';
import { ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, CanActivateChild, Router, CanActivate, CanLoad, Route, UrlSegment } from '@angular/router';
import { Observable } from 'rxjs';
import { ServicesFunction } from '../static/services';

@Injectable({
  providedIn: 'root'
})
export class ModuleGuard implements CanActivate, CanActivateChild, CanLoad {

  accesos: any[] = [];

  constructor(private router: Router, private func: ServicesFunction) {}

  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      const isLogger = this.func.inLoggerIn();
      if(!isLogger){
        localStorage.clear();
        void this.router.navigateByUrl("/login");
      }

      return isLogger;
    }

  canActivateChild(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {

      const isLogger = this.func.inLoggerIn();
      if(!isLogger){
        localStorage.clear();
        void this.router.navigateByUrl("/login");
      }

      return isLogger;
    }

    canLoad(route: Route, segments: UrlSegment[]): boolean | UrlTree | Observable<boolean | UrlTree> | Promise<boolean | UrlTree> {
      const isLogger = this.func.inLoggerIn();
      if(!isLogger){
        localStorage.clear();
        void this.router.navigateByUrl("/login");
      }

      return isLogger;
    }





}
