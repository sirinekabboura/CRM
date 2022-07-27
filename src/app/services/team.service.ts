import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class TeamService {
  url:string = 'http://localhost:8000';


  constructor(private http:HttpClient) { }
  listTeam(){
    return this.http.get<any>(this.url+`/`);
  }
  httpOptions={
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }
  addTeam(personnel: any):Observable<any>{
    return this.http.post<any>(this.url+`/`,personnel,this.httpOptions);
  }

}
