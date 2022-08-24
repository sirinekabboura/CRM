import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Comment } from '@core/comment';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
const headers = new HttpHeaders()
     .set('Content-Type', 'application/json;charset=UTF-8')  
     let options = { headers : headers };
     
let httpOptions = { responseType: 'text' };
@Injectable({
  providedIn: 'root'
})
export class CommentService {

  BackEndURL
  constructor(private http: HttpClient,private router:Router) {
    this.BackEndURL = 'http://127.0.0.1:8000/api/comment/';
    }
 
    /*List des Tache*/
    public FindAllComment(): Observable<any> {
     return this.http.get(this.BackEndURL+"index")
   }
   /*Ajouter Tache*/
   public save(comment: Comment) {
     console.log(comment);
   return this.http.post(this.BackEndURL+"create",comment,{ ...options, responseType: 'text' });
   }
   /*Supprimer Tache*/
   DeleteTache(id:number){
       return this.http.delete(this.BackEndURL+'destroy/'+id).pipe(
         map(
           commentData => {
             
           }
         )
     
       );
       
     }
   /* Update Tache */
   UpdateTache(comment:Comment){
        return this.http.put(this.BackEndURL+'update/'+comment.id,comment).pipe(
           map(
             commentData => {
             }
           )
     
         );
     }
   /* Find Tache By Id*/
   public FindTacheById(id): Observable<any>{
     return this.http.get<Comment>(this.BackEndURL+'FindTacheById/'+id);
   }
}
