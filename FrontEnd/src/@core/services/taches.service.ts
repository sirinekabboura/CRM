import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Taches } from '@core/taches';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
const headers = new HttpHeaders()
     .set('Content-Type', 'application/json;charset=UTF-8')  
     let options = { headers : headers };
     
let httpOptions = { responseType: 'text' };
@Injectable({
  providedIn: 'root'
})
export class TachesService {
  BackEndURL
  constructor(private http: HttpClient,private router:Router) {
    this.BackEndURL = 'http://127.0.0.1:8000/api/tache/';
    }
 
    /*List des Tache*/
    public FindAllTaches(): Observable<any> {
     return this.http.get(this.BackEndURL+"index")
   }
   /*Ajouter Tache*/
   public save(tache: Taches) {
     console.log(tache);
   return this.http.post(this.BackEndURL+"create",tache,{ ...options, responseType: 'text' });
   }
   /*Supprimer Tache*/
   DeleteTache(id:number){
       return this.http.delete(this.BackEndURL+'destroy/'+id).pipe(
         map(
           tacheData => {
             
           }
         )
     
       );
       
     }
   /* Update Tache */
   UpdateTache(tache:Taches){
        return this.http.put(this.BackEndURL+'update/'+tache.id,tache).pipe(
           map(
             tacheData => {
             }
           )
     
         );
     }
   /* Find Tache By Id*/
   public FindTacheById(id): Observable<any>{
     return this.http.get<Taches>(this.BackEndURL+'FindTacheById/'+id);
   }
}
