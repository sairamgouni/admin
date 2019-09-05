class MyGlobleSetting {
  constructor() {
    this.url = 'http://localhost/euraka/public/';
    this.adminDashboardUrl = this.url+'home';
    this.adminCategoriesUrl = this.url+'/admin/categories';
  }
}
export default (new MyGlobleSetting);