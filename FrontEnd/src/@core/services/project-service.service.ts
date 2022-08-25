import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Project } from '@core/project';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
const headers = new HttpHeaders()
     .set('Content-Type', 'application/json;charset=UTF-8')  
     let options = { headers : headers };
     
let httpOptions = { responseType: 'text' };
@Injectable({
  providedIn: 'root'
})
export class ProjectServiceService {
  BackEndURL
  constructor(private http: HttpClient,private router:Router) {
    this.BackEndURL = 'http://127.0.0.1:8000/api/project/';
    }
 
    /*List des Project*/
    public FindAllProjects(): Observable<any> {
     return this.http.get(this.BackEndURL+"index")
   }
   /*Ajouter Project*/
   public save(event: Project) {
     console.log(Project);
   return this.http.post(this.BackEndURL+"create",event,{ ...options, responseType: 'text' });
   }
   /*Supprimer Project*/
   DeleteProject(id:number){
       return this.http.delete(this.BackEndURL+'destroy/'+id).pipe(
         map(
           projectData => {
             
           }
         )
     
       );
       
     }
   /* Update Project */
   UpdateProject(event:Project){
        return this.http.put(this.BackEndURL+'update',event).pipe(
           map(
             projectData => {
             }
           )
     
         );
     }
   /* Find Project By Id*/
   public FindProjectById(id:number): Observable<any>{
     return this.http.get<Project>(this.BackEndURL+'FindProject/'+id); 
   }
}
