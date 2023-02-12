import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ModuleGuard } from './shared/guards/guards.guards';
import { SharedModule } from './shared/shared.module';
import { GrissyContainerComponent } from './views/grissy/grissy-container/grissy-container.component';
import { HomeContainerComponent } from './views/principal/home-container/home-container.component';


@NgModule({
  declarations: [
    AppComponent,
    GrissyContainerComponent,
    HomeContainerComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    SharedModule
  ],
  providers: [ModuleGuard],
  bootstrap: [AppComponent]
})
export class AppModule { }
