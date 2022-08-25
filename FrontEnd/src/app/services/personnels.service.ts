import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class PersonnelsService {

  url:string = 'http://127.0.0.1:8000';


  constructor(private http:HttpClient) { }

  listPersonnels(){
    return this.http.get<any>(this.url+`/api/Personnels/index`);
  }
  listUsers(){
    return this.http.get<any>(this.url+`/api/User/index`);
  }


  httpOptions={
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  addPersonnels(personnel: any):Observable<any>{
    return this.http.post<any>(this.url+`/api/Personnels`,personnel,this.httpOptions);
  }

  find(id: number):Observable<any>{
    return this.http.get<any>(this.url+`/api/Personnels/show/`+id);
  }

  update( id: number,personnel: any):Observable<any>{
    return this.http.put<any>(this.url+`/api/Personnels/`+id,personnel,this.httpOptions);
  }
  delete(id: any):Observable<any>{
    return this.http.delete<any>(this.url+`/api/Personnels/delete/`+id,this.httpOptions);
  }
  
}
