/**
 * Created by zainul on 22/05/16.
 */

var App = angular.module('fitoutApp',[]);

App.controller('StatsController',['$scope','$http',function($scope,$http){
    $scope.stats = [{"title" : "Cheaper", "value": 36},{"title" : "Faster", "value" : 76},{"title": "In House Assistance", "value" : 101},{"title" : "Value for Money", "value" : 101},{"title" : "Rejection in Authroity Approvals", "value" : 0},{"title" : "Defect Policy", "value" : 0},{"title" : "In-House Design", "value" : 100}];
}]);

App.controller('AchievementController',['$scope','$http',function($scope,$http){
    $scope.achievementList = [{"icon":"fa-briefcase","title":"Years in Business","value":9},{"icon":"fa-pagelines","title":"Branches","value":7},{"icon":"fa-folder-open","title":"Projects","value":1024},{"icon":"fa-shield","title":"Awards","value":28},{"icon":"fa-users","title":"Team Memebers","value":75},{"icon":"fa-gears","title":"Project Management","value":125}];
}]);

App.controller('ProtfolioController',['$scope','FitOutService',function($scope,FitOutService){

    $scope.portfolioTitleList = [
        {"title":"Commercial","filter":".commercial"},
        {"title":"Residential","filter":".residential"},
        {"title":"Retail","filter":".retail"},
        {"title":"Business Centre","filter":".business"},
        {"title":"Furniture","filter":".furniture"},
        {"title":"Exhibitions","filter":".exhibition"},
        {"title":"Landscaping","filter":".landscaping"}
    ];



    //get portfolio
    FitOutService.getPortfolio().success(function(data){
        if (data.status == 'SUCCESS'){
            //$scope.portfolioItems = data.response;

            //initialize and display gallery
            jQuery("#portfolioGallery").nanoGallery({
                thumbnailWidth:281,thumbnailHeight:271,
                items:data.response,
                thumbnailHoverEffect:[{'name':'labelSlideUp','duration':300}],
                thumbnailLabel:{display:true,position:'overImageOnMiddle', align:'center'},
                thumbnailLazyLoad:true,
                theme:'clean',
                colorScheme:'light',
                locationHash: false,
                useTags:false,
                breadcrumbAutoHideTopLevel:true,
                maxItemsPerLine:3,
                level1: { thumbnailWidth: 300, thumbnailHeight: 150 },
                itemsBaseURL:'images/portfolio/'
            });


        }
        //assign value
    }).error(function(){
        console.log(error);
    });


    //$scope.portfolioItems = [{"ID":"101","src":"commercial.jpg","srct":"thumb/tn_commercial.jpg","title":"Commercial","kind":"album"},{"ID":"102","src":"residential.jpg","srct":"thumb/tn_residential.jpg","title":"Residential","kind":"album"},{"ID":"103","src":"retail.jpg","srct":"thumb/tn_retail.jpg","title":"Retail","kind":"album"},{"ID":"104","src":"business_center.jpg","srct":"thumb/tn_business_center.jpg","title":"Business Center","kind":"album"},{"ID":"105","src":"furniture.jpg","srct":"thumb/tn_furniture.jpg","title":"Furniture","kind":"album"},{"ID":"106","src":"Exhibitions.jpg","srct":"thumb/tn_Exhibitions.jpg","title":"Exhibitions","kind":"album"},{"ID":"107","src":"Landscaping.jpg","srct":"thumb/tn_Landscaping.jpg","title":"Landscaping","kind":"album"},{"ID":"108","src":"Al-Masha-office-20150610-WA0009.jpg","srct":"thumb/tn_Al-Masha-office-20150610-WA0009.jpg","title":"Al Masha Office Space","albumID":"101","kind":"album"},{"ID":"109","src":"osray-retail-001.jpg","srct":"thumb/tn_osray-retail-001.jpg","title":"Osray Retails","albumID":"103","kind":"album"},{"ID":"110","src":"Al-Masha-office-20150610-WA0009.jpg","srct":"thumb/tn_Al-Masha-office-20150610-WA0009.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"111","src":"Al-Masha-office-20160204-WA0071.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0071.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"112","src":"Al-Masha-office-20160204-WA0072.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0072.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"113","src":"Al-Masha-office-20160204-WA0074.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0074.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"114","src":"Al-Masha-office-20160204-WA0075.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0075.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"115","src":"Al-Masha-office-20160204-WA0083.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0083.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"116","src":"Al-Masha-office-20160204-WA0084.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0084.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"117","src":"Al-Masha-office-20160204-WA0086.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0086.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"118","src":"Al-Masha-office-20160204-WA0088.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0088.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"119","src":"Al-Masha-office-20160204-WA0106.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0106.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"120","src":"Al-Masha-office-20160204-WA0110.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0110.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"121","src":"Al-Masha-office-20160204-WA0111.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0111.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"122","src":"Al-Masha-office-20160204-WA0122.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0122.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"123","src":"Al-Masha-office-20160204-WA0128.jpg","srct":"thumb/tn_Al-Masha-office-20160204-WA0128.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"124","src":"Al-Masha-office-20160205-WA0005.jpg","srct":"thumb/tn_Al-Masha-office-20160205-WA0005.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"125","src":"Al-Masha-office-20160205-WA0006.jpg","srct":"thumb/tn_Al-Masha-office-20160205-WA0006.jpg","title":"Al Masha Office Space","albumID":"108"},{"ID":"126","src":"osray-retail-001.jpg","srct":"thumb/tn_osray-retail-001.jpg","title":"Osray Retails","albumID":"109"},{"ID":"127","src":"osray-retail-003.jpg","srct":"thumb/tn_osray-retail-003.jpg","title":"Osray Retails","albumID":"109"},{"ID":"128","src":"osray-retail-0115.jpg","srct":"thumb/tn_osray-retail-0115.jpg","title":"Osray Retails","albumID":"109"},{"ID":"129","src":"osray-retail-117.jpg","srct":"thumb/tn_osray-retail-117.jpg","title":"Osray Retails","albumID":"109"},{"ID":"130","src":"osray-retail-119.jpg","srct":"thumb/tn_osray-retail-119.jpg","title":"Osray Retails","albumID":"109"},{"ID":"131","src":"osray-retail-212.jpg","srct":"thumb/tn_osray-retail-212.jpg","title":"Osray Retails","albumID":"109"},{"ID":"132","src":"osray-retail-215.jpg","srct":"thumb/tn_osray-retail-215.jpg","title":"Osray Retails","albumID":"109"},{"ID":"133","src":"osray-retail-218.jpg","srct":"thumb/tn_osray-retail-218.jpg","title":"Osray Retails","albumID":"109"},{"ID":"134","src":"osray-retail-219.jpg","srct":"thumb/tn_osray-retail-219.jpg","title":"Osray Retails","albumID":"109"},{"ID":"135","src":"osray-retail-241.jpg","srct":"thumb/tn_osray-retail-241.jpg","title":"Osray Retails","albumID":"109"},{"ID":"136","src":"osray-retail-257.jpg","srct":"thumb/tn_osray-retail-257.jpg","title":"Osray Retails","albumID":"109"},{"ID":"137","src":"osray-retail-308.jpg","srct":"thumb/tn_osray-retail-308.jpg","title":"Osray Retails","albumID":"109"},{"ID":"138","src":"osray-retail-315.jpg","srct":"thumb/tn_osray-retail-315.jpg","title":"Osray Retails","albumID":"109"},{"ID":"139","src":"osray-retail-317.jpg","srct":"thumb/tn_osray-retail-317.jpg","title":"Osray Retails","albumID":"109"},{"ID":"140","src":"osray-retail-352.jpg","srct":"thumb/tn_osray-retail-352.jpg","title":"Osray Retails","albumID":"109"},{"ID":"141","src":"osray-retail-412.jpg","srct":"thumb/tn_osray-retail-412.jpg","title":"Osray Retails","albumID":"109"},{"ID":"142","src":"osray-retail-414.jpg","srct":"thumb/tn_osray-retail-414.jpg","title":"Osray Retails","albumID":"109"}];
}]);

/* =========== directives =========== */

/* pie charts for stats */
App.directive('fitoutStats',function(){
    return {
        restrict: "A,E,C",
        replace: true,
        templateUrl:'template/stats.html',
        controller: [
            '$scope',
            '$http',
            'FitOutService',
            function ($scope, $http, FitOutService) {
                $scope.loading = true;
            }
        ]
    };
});

/* =========== Services =========== */
//services to get list of all Locations & Cultures
App.factory('FitOutService',['$http',function($http){

    var Service = {};

    //service get protfolio
    Service.getPortfolio = function(){
        var callUrl = "./services/gallery.php";
        return $http({
            method:"GET",
            url : callUrl
        });
    }

    return Service;

}]);