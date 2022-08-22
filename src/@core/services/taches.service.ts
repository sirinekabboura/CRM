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
    this.BackEndURL = 'http://localhost:8089/work-mood/Taches/';
    }
 
    /*List des Tache*/
    public FindAllTaches(): Observable<any> {
     return this.http.get(this.BackEndURL+"Taches")
   }
   /*Ajouter Tache*/
   public save(tache: Taches) {
     console.log(tache);
   return this.http.post(this.BackEndURL+"AddTache",tache,{ ...options, responseType: 'text' });
   }
   /*Supprimer Tache*/
   DeleteTache(id:number){
       return this.http.delete(this.BackEndURL+'DeleteTache/'+id).pipe(
         map(
           tacheData => {
             
           }
         )
     
       );
       
     }
   /* Update Tache */
   UpdateTache(tache:Taches){
        return this.http.put(this.BackEndURL+'UpdateTache',tache).pipe(
           map(
             tacheData => {
             }
           )
     
         );
     }
   /* Find Tache By Id*/
   public FindTacheById(id:number): Observable<any>{
     return this.http.get<Taches>(this.BackEndURL+'FindTache/'+id); 
   }
}
