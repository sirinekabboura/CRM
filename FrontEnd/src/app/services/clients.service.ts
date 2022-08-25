import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ClientsService {

  url:string = 'http://127.0.0.1:8000';


  constructor(private http:HttpClient) { }

  listClients(){
    return this.http.get<any>(this.url+`/api/Clients/index`);
  }
  listUsers(){
    return this.http.get<any>(this.url+`/api/User/index`);
  }


  httpOptions={
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  addClients(client: any):Observable<any>{
    return this.http.post<any>(this.url+`/api/Clients`,client,this.httpOptions);
  }

  find(id: number):Observable<any>{
    return this.http.get<any>(this.url+`/api/Clients/show/`+id);
  }

  update( id: number,client: any):Observable<any>{
    return this.http.put<any>(this.url+`/api/Clients/`+id,client,this.httpOptions);
  }
  delete(id: any):Observable<any>{
    return this.http.delete<any>(this.url+`/api/Clients/delete/`+id,this.httpOptions);
  }
  
}
