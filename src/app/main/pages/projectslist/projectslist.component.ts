import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-projectslist',
  templateUrl: './projectslist.component.html',
  styleUrls: ['./projectslist.component.scss']
})
export class ProjectslistComponent implements OnInit {
  ProjectType
  constructor(private router : Router,private route: ActivatedRoute) { }

  ngOnInit(): void {
    this.ProjectType=this.route.snapshot.paramMap.get('ProjectType');
  }
  AjouterProject(){
    this.router.navigateByUrl('projects/ajouterproject/'+this.ProjectType)
  }
}
