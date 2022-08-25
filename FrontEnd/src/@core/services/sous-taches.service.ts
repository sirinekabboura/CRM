import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { SousTaches } from '@core/sous-taches';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
const headers = new HttpHeaders()
     .set('Content-Type', 'application/json;charset=UTF-8')  
     let options = { headers : headers };
     
let httpOptions = { responseType: 'text' };
@Injectable({
  providedIn: 'root'
})
export class SousSousTachesService {
  BackEndURL
  constructor(private http: HttpClient,private router:Router) {
    this.BackEndURL = 'http://127.0.0.1:8000/api/soustache/';
    }
 
    /*List des Tache*/
    public FindAllSousTaches(): Observable<any> {
     return this.http.get(this.BackEndURL+"index")
   }
   /*Ajouter Tache*/
   public save(soustache: SousTaches) {
     console.log(soustache);
   return this.http.post(this.BackEndURL+"create",soustache,{ ...options, responseType: 'text' });
   }
   /*Supprimer Tache*/
   DeleteTache(id:number){
       return this.http.delete(this.BackEndURL+'destroy/'+id).pipe(
         map(
           soustacheData => {
             
           }
         )
     
       );
       
     }
   /* Update Tache */
   UpdateTache(soustache:SousTaches){
        return this.http.put(this.BackEndURL+'update',soustache).pipe(
           map(
             soustacheData => {
             }
           )
     
         );
     }
   /* Find Tache By Id*/
   public FindSousTacheById(id:number): Observable<any>{
     return this.http.get<SousTaches>(this.BackEndURL+'FindSousTacheById/'+id); 
   }
}
