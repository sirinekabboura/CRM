import { Injectable } from '@angular/core';
const BASE_URL = 'http://localhost:5000/users';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private httpClient : HttpClient) { }
  Login(email,password){
    return this.httpClient.get(BASE_URL + '/login/'+email+'/'+password);
  }
}
