import { Injectable } from '@angular/core';
import { CoreSidebarComponent } from '@core/components/core-sidebar/core-sidebar.component';
import { BehaviorSubject, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CoreSidebarService {
  // Private
  private _registry: { [key: string]: CoreSidebarComponent } = {};
  public idTache: number;
  /**
   * Get the sidebar with the given key
   *
   * @param key
   * @returns {CoreSidebarComponent}
   */
  getSidebarRegistry(key): CoreSidebarComponent {
    // Check if the sidebar registered

    if (!this._registry[key]) {
      console.warn(`The sidebar with the key '${key}' doesn't exist in the registry.`);
      return;
    }

    // Return the sidebar
    return this._registry[key];
  }
  public editDataDetails: any = [];
  public subject = new Subject<any>();
  private messageSource = new  BehaviorSubject(this.editDataDetails);
  currentid = this.messageSource.asObservable();

  changeMessage(id: number) {this.messageSource.next(id)}
  setIdTache(id){
    this.idTache=id;
  }
  public getIdTache(){
    console.log("Tache Id =>")
  }
  /**
   * Set the sidebar to the registry
   *
   * @param key
   * @param sidebar
   */

  setSidebarRegistry(key, sidebar): void {
    // Check if the key already being used
    if (this._registry[key]) {
      console.error(
        `The sidebar with the key '${key}' already exists. Either unregister it first or use a unique key.`
      );

      return;
    }

    // Set to the registry
    this._registry[key] = sidebar;
  }


  /**
   * Remove the sidebar from the registry
   *
   * @param key
   */
  removeSidebarRegistry(key): void {
    // Check if the sidebar registered
    if (!this._registry[key]) {
      console.warn(`The sidebar with the key '${key}' doesn't exist in the registry.`);
    }

    // Unregister the sidebar
    delete this._registry[key];
  }
}
