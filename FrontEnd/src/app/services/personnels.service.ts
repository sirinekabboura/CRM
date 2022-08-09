import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class PersonnelsService {

  url:string = 'http://localhost:8000';


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
    return this.http.post<any>(this.url+`/`,personnel,this.httpOptions);
  }

  find(id: number):Observable<any>{
    return this.http.get<any>(this.url+`/api/Personnels/show/`+id);
  }
  
}
