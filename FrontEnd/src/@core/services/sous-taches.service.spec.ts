import { TestBed } from '@angular/core/testing';
import { SousSousTachesService } from './sous-taches.service';


describe('SousTachesService', () => {
  let service: SousSousTachesService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(SousSousTachesService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
