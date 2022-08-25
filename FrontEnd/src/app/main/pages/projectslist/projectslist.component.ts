import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProjectServiceService } from '@core/services/project-service.service';

@Component({
  selector: 'app-projectslist',
  templateUrl: './projectslist.component.html',
  styleUrls: ['./projectslist.component.scss']
})
export class ProjectslistComponent implements OnInit {
  ProjectType
  ListProjects;
  constructor(private router : Router,private route: ActivatedRoute,private ps:ProjectServiceService) { }

  ngOnInit(): void {
    this.ProjectType=this.route.snapshot.paramMap.get('ProjectType');
   this.ps.FindAllProjects().subscribe(data=>{
      this.ListProjects=data.projects;
    })
  }
  AjouterProject(){
    this.router.navigateByUrl('projects/ajouterproject/'+this.ProjectType)
  }
  DeleteProject(id:number){
    this.ps.DeleteProject(id).subscribe(data=>{
      this.ps.FindAllProjects().subscribe(data=>{
        this.ListProjects=data.projects;
      })
    }
    )
  }
}
