import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements OnInit {
  ProjectType
  constructor(private router: Router) { }

  ngOnInit(): void {
  }
  WebApplication(){
    this.ProjectType='Appweb'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
  CrossPlatform(){
    this.ProjectType='CrossPlatforme'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
  SiteVitrine(){
    this.ProjectType='Sitevetrine'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
  MobileApplication(){
    this.ProjectType='Appmobile'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
  ECommerce(){
    this.ProjectType='Ecommerce'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
  ReseauxSociaux(){
    this.ProjectType='Gestion Rsociaux'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
  DesignGraphique(){
    this.ProjectType='DesignGraphique'
    this.router.navigateByUrl('/projectslist/'+this.ProjectType)
  }
}
