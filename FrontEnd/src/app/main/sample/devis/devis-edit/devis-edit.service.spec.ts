import { TestBed } from '@angular/core/testing';

import { DevisEditService } from './devis-edit.service';

describe('DevisEditService', () => {
  let service: DevisEditService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DevisEditService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
