 
    
    $(function() {
        "use strict";
        // ============================================================== 
        // Product Sales
        // ============================================================== 

        new Chartist.Bar('.ct-chart-product', {
            labels: ['Q1', 'Q2', 'Q3', 'Q4'],
            series: [
                [800000, 1200000, 1400000, 1300000],
                [200000, 400000, 500000, 300000],
                [100000, 200000, 400000, 600000]
            ]
        }, {
            stackBars: true,
            axisY: {
                labelInterpolationFnc: function(value) {
                    return (value / 1000) + 'k';
                }
            }
        }).on('draw', function(data) {
            if (data.type === 'bar') {
                data.element.attr({
                    style: 'stroke-width: 40px'
                });
            }
        });
    });




    // ============================================================== 
    // Product Category
    // ============================================================== 
    var chart = new Chartist.Pie('.ct-chart-category', {
        series: [60, 30, 30],
        labels: ['Bananas', 'Apples', 'Grapes']
    }, {
        donut: true,
        showLabel: false,
        donutWidth: 40

    });


    chart.on('draw', function(data) {
        if (data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();

            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            // Create animation definition while also assigning an ID to the animation for later sync usage
            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1000,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                    fill: 'freeze'
                }
            };

            // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            // We can't use guided mode as the animations need to rely on setting begin manually
            // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
            data.element.animate(animationDefinition, false);
        }
    });

    // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
    


    // ============================================================== 
    // Customer acquisition
    // ============================================================== 
    var chart = new Chartist.Line('.ct-chart', {
        labels: ['Mon', 'Tue', 'Wed'],
        series: [
            [1, 5, 2, 5],
            [2, 3, 4, 8]

        ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });

    chart.on('draw', function(data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 2000 * data.index,
                    dur: 2000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            });
        }
    });




    // ============================================================== 
    // Revenue Cards
    // ============================================================== 
    $("#sparkline-revenue").sparkline([5, 5, 7, 7, 9, 5, 3, 5, 2, 4, 6, 7], {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#5969ff',
        fillColor: '#dbdeff',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });



    $("#sparkline-revenue2").sparkline([3, 7, 6, 4, 5, 4, 3, 5, 5, 2, 3, 1], {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#ff407b',
        fillColor: '#ffdbe6',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });



    $("#sparkline-revenue3").sparkline([5, 3, 4, 6, 5, 7, 9, 4, 3, 5, 6, 1], {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#25d5f2',
        fillColor: '#dffaff',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true
    });



    $("#sparkline-revenue4").sparkline([6, 5, 3, 4, 2, 5, 3, 8, 6, 4, 5, 1], {
        type: 'line',
        width: '99.5%',
        height: '100',
        lineColor: '#fec957',
        fillColor: '#fff2d5',
        lineWidth: 2,
        spotColor: undefined,
        minSpotColor: undefined,
        maxSpotColor: undefined,
        highlightSpotColor: undefined,
        highlightLineColor: undefined,
        resize: true,
    });





    // ============================================================== 
    // Total Revenue
    // ============================================================== 
    Morris.Area({
        element: 'morris_totalrevenue',
        behaveLikeLine: true,
        data: [
            { x: '2016 Q1', y: 0, },
            { x: '2016 Q2', y: 7500, },
            { x: '2017 Q3', y: 15000, },
            { x: '2017 Q4', y: 22500, },
            { x: '2018 Q5', y: 30000, },
            { x: '2018 Q6', y: 40000, }
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Y'],
        lineColors: ['#5969ff'],
        resize: true

    });




    // ============================================================== 
    // Revenue By Categories
    // ============================================================== 

    var chart = c3.generate({
        bindto: "#c3chart_category",
        data: {
            columns: [
                ['Men', 100],
                ['Women', 80],
                ['Accessories', 50],
                ['Children', 40],
                ['Apperal', 20],

            ],
            type: 'donut',

            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); },

            colors: {
                Men: '#5969ff',
                Women: '#ff407b',
                Accessories: '#25d5f2',
                Children: '#ffc750',
                Apperal: '#2ec551',



            }
        },
        donut: {
            label: {
                show: false
            }
        },



    });


    // ===========================

    Vue.component("step-navigation-step", {
        template: "#step-navigation-step-template",

        props: ["step", "currentstep"],

        computed: {
            indicatorclass() {
                return {
                    active: this.step.id == this.currentstep,
                    complete: this.currentstep > this.step.id
                };
            }
        }
    });

    Vue.component("step-navigation", {
        template: "#step-navigation-template",

        props: ["steps", "currentstep"]
    });

    Vue.component("step", {
        template: "#step-template",

        props: ["step", "stepcount", "currentstep"],

        computed: {
            active() {
                return this.step.id == this.currentstep;
            },

            firststep() {
                return this.currentstep == 1;
            },

            laststep() {
                return this.currentstep == this.stepcount;
            },

            stepWrapperClass() {
                return {
                    active: this.active
                };
            }
        },

        methods: {
            nextStep() {
                this.$emit("step-change", this.currentstep + 1);
            },

            lastStep() {
                this.$emit("step-change", this.currentstep - 1);
            }
        }
    });

    new Vue({
        el: "#app",

        data: {
            currentstep: 1,

            steps: [
                {
                    id: 1,
                    title: "Personal",
                    icon_class: "fa fa-user-circle-o"
                },
                {
                    id: 2,
                    title: "Details",
                    icon_class: "fa fa-th-list"
                },
                {
                    id: 3,
                    title: "Send",
                    icon_class: "fa fa-paper-plane"
                }
            ]
        },

        methods: {
            stepChanged(step) {
                this.currentstep = step;
            }
        }
    });


    $(document).ready(function () {
        $("#wizard").aiiaWizard();
    });

    ;(function ($, window, document, undefined) {

        var settings;

        ////////////////////////////////////////// Public methods

        var pub = {

            init: function (options) {

                return this.each(function () {

                    var $this = $(this),
                        data = $this.data('aiiaWizard'),
                        aiiaWizard = $('<div />', {
                            text: $this.attr('title')
                        });

                    //#region If the plugin hasn't been initialized yet
                    if (!data) {

                        $(this).data('aiiaWizard', {});

                        $this.hide();

                        ///////////////////////// Main configurable options object

                        settings = $.extend(true, $.fn.aiiaWizard.defaults, options);
                        var globalMinHeight = settings.aiiaWizard.minHeight;
                        var buttonFinishText = settings.aiiaWizard.localization.buttons.finish;
                        var buttonLoadingText = settings.aiiaWizard.localization.buttons.loading;
                        var activeStep = settings.aiiaWizard.activeStep;

                        $(this).data('aiiaWizard').settings = settings;

                        ///////////////////////// Prepare Wizard components

                        var $stepsWrapper = getStepsWrapperTemplate(globalMinHeight);
                        var $buttons = getButtonsTemplate(settings);
                        var $steps = $this.find(".aiia-wizard-step");

                        $buttonNext = $buttons.find(".aiia-wizard-button-next");
                        $buttonPrevious = $buttons.find(".aiia-wizard-button-previous");

                        ///////////////////////// Place Wizard component

                        $stepsWrapper.append($steps);       // Place steps in the steps wrapper
                        $this.append($stepsWrapper);        // Place the steps wrapper that now contains all the steps in the original container
                        $this.append($buttons);             // Place Buttons right after the steps wrapper

                        ///////////////////////// Shape Step elements

                        $steps.css({
                            'position': 'absolute',
                            'min-height': globalMinHeight + 'px',
                            'width': '100%'
                        });

                        ////////////////////////// Mark each step element with its current position to
                        ////////////////////////// easily keep track of the order (starting with 1)

                        $.each($steps, function (i, step) {
                            $(step).attr('data-position', i + 1);
                            //markStepAsCompleted(i - 1, $this, settings);
                        })

                        var $progressButtonsTemplate = getProgressButtonsTemplate($steps, settings);
                        $this.prepend($progressButtonsTemplate);

                        /////////////////////////// Find the active step or set the first step active as default

                        if (!$(".active").length) {
                            $steps.eq(activeStep - 1).addClass("active");
                            highlightActiveElement($this);
                        }

                        var $activeStep = $stepsWrapper.find(".active");
                        var activeElementPosition = parseInt($activeStep.data('position'), 10);

                        $.each($steps, function (i, step) {

                            var $step = $(step);
                            var $newStepTitleTemplate = getStepTitleTemplate(i, $step, settings);
                            $step.prepend($newStepTitleTemplate);

                            if ((i + 1) < activeElementPosition) {
                                moveStepLeft($step);
                                markStepAsCompleted(i + 1, $this, settings);
                            } else if ((i + 1) > activeElementPosition) {
                                moveStepRight($step);
                            } else {
                                showStep($step); // Only one element should satisfy this condition
                                highlightActiveElement($this);
                                markStepAsCompleted(i + 1, $this, settings);
                            }

                        });

                        var $progressButtonsBorderBottom = getProgressButtonsBorderBottomTemplate(settings);
                        $progressButtonsTemplate.after($progressButtonsBorderBottom);

                        /////////////////////////// We can now show the plugin component
                        $this.show();

                        /////////////////////////// Activate buttons accordingly to which step is active

                        // If final step is shown
                        if (activeElementPosition === $steps.length) {
                            setFinishButton($this);
                        }

                        // If first step is shown
                        if (activeElementPosition === 1) {
                            $this.find('.aiia-wizard-button-previous').hide();
                        }

                        /////////////////////////// Register event handlers

                        $this.find('.aiia-wizard-button-previous').click(function (e) {
                            e.preventDefault();
                            var $elementToSlide = $this.find(".aiia-wizard-steps-wrapper .active");
                            $this.trigger("onButtonPreviousClick.aiiaWizard", this);

                            if ($.isFunction(settings.onButtonPreviousClick)) {
                                // Trigger the override callback it the callback is set at the plugin initialization...
                                settings.onButtonPreviousClick.call(this);
                            } else {
                                // ...slide right imediatelly otherwise.
                                slideRight($elementToSlide, settings, $this);
                            }
                        });

                        $this.on("slideRightSuccess.aiiaWizard", function () {
                            resizeWizardStepsWrapper($this);
                        });

                        $this.on("slideLeftSuccess.aiiaWizard", function () {
                            resizeWizardStepsWrapper($this);
                        });

                        $this.find('.aiia-wizard-button-next').click(function (e) {
                            e.preventDefault();
                            var $elementToSlide = $this.find(".aiia-wizard-steps-wrapper .active");

                            if ($.isFunction(settings.onButtonNextClick)) {
                                // Trigger the override callback it the callback is set at the plugin initialization...
                                settings.onButtonNextClick.call(this);
                            } else {
                                // ...slide left imediatelly otherwise.
                                slideLeft($elementToSlide, settings, $this);
                            }

                        });

                        /////////////////////////// Testing Success Icon

                        var $progressButtonsPlaceholder = $progressButtonsTemplate.find(".aiia-wizard-progress-buttons-placeholder");
                        var $progressButtons = $progressButtonsPlaceholder.children();

                        /////////////////////////// Store plugin data

                        $this.data('aiiaWizard').target = $this;
                        $this.data('aiiaWizard').aiiaWizard = aiiaWizard;
                        $this.data('aiiaWizard').settings = settings;

                        resizeWizardStepsWrapper($this);

                        $.isFunction(settings.onInitSuccess) && settings.onInitSuccess.call(this);
                        $this.trigger("initSuccess.aiiaWizard", this);
                    }
                    //#endregion
                });
            },
            isFinalElementShown: function (a, b) {
                var activeElementPosition = getActiveElementPosition($(this));
                if (activeElementPosition === countElements($(this))) {
                    return true;
                } else {
                    return false;
                }
            },
            hideButtonNext: function () {
                // TODO: implement
            },
            hideButtonPrevious: function () {
                // TODO: implement
            },
            previous: function () {
                previous($plugin);
            },
            next: function () {
                $plugin = $(this);
                var settings = $plugin.data('aiiaWizard').settings;
                var $elementToSlide = $plugin.find(".aiia-wizard-steps-wrapper .active");
                slideLeft($elementToSlide, settings, $plugin);
            },
            first: function (a) {
                previous(a, true);
                $plugin.on("slideRightSuccess.aiiaWizard", function (event, goToFirst) {
                    if (goToFirst == true)
                        previous(a, true);
                });

            },
            final: function () {
                // TODO: implement
            },
            // disables the "previous" button for the provided step
            disablePreviousButton: function (stepNumber) {
                // TODO: implement
            },

            // enables the "previous" button for the provided step
            enablePreviousButton: function (stepNumber) {
                // TODO: implement
            },
            getActiveStep: function () {
                $plugin = $(this);
                return parseInt($plugin.find(".aiia-wizard-steps-wrapper .active").attr("data-position"), 10);
            }
        };

        ////////////////////////////////////////// Private functions

        function resizeWizardStepsWrapper($this) {
            var $wizardStepsWrapper = $this.find(".aiia-wizard-steps-wrapper");
            var $activeStep = $wizardStepsWrapper.find(".active");

            $wizardStepsWrapper.clearQueue().animate({
                "height": $activeStep.height() + "px"
            });
        }

        function slideLeft($elementToSlide, settings, $plugin, slideSuccessCallback) {

            if ($elementToSlide.next().length) {

                $elementToSlide.clearQueue().animate({
                    'margin-left': '-100%'
                });

                var $next = $elementToSlide.next();

                $next.clearQueue().animate({
                    'margin-left': 0
                }, function () {

                    $(".aiia-wizard-step").removeClass("active");
                    $next.addClass("active");

                    var activeElementPosition = highlightActiveElement($plugin);
                    var stepsCount = $plugin.find(".aiia-wizard-step").length;

                    markStepAsCompleted(activeElementPosition, $plugin, settings);

                    if (activeElementPosition === stepsCount) {
                        setFinishButton($plugin);
                        $.isFunction(settings.onSlideLeftLimitReached) && settings.onSlideLeftLimitReached.call($plugin);
                        $plugin.trigger("slideLeftLimitReached.aiiaWizard", this);
                    } else {
                        $plugin.find('.aiia-wizard-button-previous').show();
                    }

                    var $progressButtons = $plugin.find(".aiia-wizard-progress-buttons-placeholder").children();

                    $.isFunction(settings.onSlideLeftFinished) && settings.onSlideLeftFinished.call($plugin);
                    $plugin.trigger("slideLeftSuccess.aiiaWizard", this);
                });

            }

        }

        function slideRight($elementToSlide, settings, $plugin, goToFirst) {

            if ($elementToSlide.prev().length) {

                // Move the target element to the right first (out of the visual field)...
                $elementToSlide.clearQueue().animate({
                    'margin-left': '100%'
                });

                // ...find the previous step element and move it into the visual field, thus making it the new active element.
                var $prev = $elementToSlide.prev();

                $prev.clearQueue().animate({
                    'margin-left': 0
                }, function () {

                    $plugin.find(".aiia-wizard-step").removeClass("active");

                    $prev.addClass("active");

                    var activeElementPosition = highlightActiveElement($plugin);
                    unmarkStepAsCompleted(activeElementPosition, $plugin);

                    if (activeElementPosition === 1) {
                        $plugin.find('.aiia-wizard-button-previous').hide();

                        $.isFunction(settings.onSlideRightLimitReached) && settings.onSlideRightLimitReached.call($plugin);
                        $plugin.trigger("slideRightLimitReached.aiiaWizard", this);
                    } else {
                        if ($plugin.find('.aiia-wizard-button-next').hasClass('btn-success')) {
                            unsetFinishButton($plugin, settings);
                        }
                    }

                    $.isFunction(settings.onSlideRightFinished) && settings.onSlideRightFinished.call($plugin);
                    $plugin.trigger("slideRightSuccess.aiiaWizard", goToFirst);

                });

            }
        }

        function getButtonsTemplate(settings) {
            var $buttons = $("" +
                "<div class='aiia-wizard-buttons-wrapper row'>" +
                "<div class='col-md-12'>" +
                "<button class='btn btn-primary pull-left aiia-wizard-button-previous'></button>" +
                "<button class='btn btn-primary pull-right aiia-wizard-button-next' data-loading-text='" + settings.aiiaWizard.localization.buttons.loading + "'></button>" +
                "</div>" +
                "</div>" +
                "").css({
                'display': 'block'
            });

            var $iconPrevious = $("<span class='glyphicon glyphicon-chevron-left pull-left'></span>");
            var $iconPreviousText = $("<span>" + settings.aiiaWizard.localization.buttons.previous + "</span>");
            $iconPrevious.css(settings.aiiaWizard.buttons.previous.icon.css);
            $iconPreviousText.css(settings.aiiaWizard.buttons.previous.text.css);

            var $iconNext = $("<span class='glyphicon glyphicon-chevron-right pull-right'></span>");
            var $iconNextText = $("<span>" + settings.aiiaWizard.localization.buttons.next + "</span>");
            $iconNext.css(settings.aiiaWizard.buttons.next.icon.css);
            $iconNextText.css(settings.aiiaWizard.buttons.next.text.css);

            $buttons.find(".btn").css(settings.aiiaWizard.buttons.css);

            $buttons.find(".aiia-wizard-button-previous")
            //.append($iconPrevious)
                .append($iconPreviousText);

            $buttons.find(".aiia-wizard-button-next")
            //.append($iconNext)
                .append($iconNextText);

            return $buttons;
        }

        function highlightActiveElement($plugin) {

            // find the active element position
            var $stepsWrapper = $plugin.find(".aiia-wizard-steps-wrapper");
            var $activeElement = $stepsWrapper.find(".active");
            var activeElementPosition = parseInt($activeElement.data('position'), 10);

            var $progressButtons = $plugin.find(".aiia-wizard-progress-buttons-placeholder");
            $progressButtons.find(".active").removeClass("active");
            $progressButtons.find("li[data-position='" + activeElementPosition + "']").addClass("active");

            return activeElementPosition;
        }

        function getStepsWrapperTemplate(globalMinHeight) {
            var result = $("<div class='aiia-wizard-steps-wrapper'></div>")
                .css({
                    'position': 'relative',
                    'overflow': 'hidden',
                    'width': '100%',
                    'min-height': globalMinHeight + 'px'
                });
            return result;
        }

        function getProgressButtonsTemplate($steps, settings) {

            var $progessButtonsWrapper = $("" +
                "<div class='aiia-wizard-progress-buttons-wrapper row'>" +
                "<div class='col-md-12'>" +
                "<ul class='nav nav-pills nav-justified aiia-wizard-progress-buttons-placeholder'>" +
                "</ul>" +
                "</div>" +
                "</div>" +
                "").css({
                'display': 'block'
            });

            $.each($steps, function (i, step) {
                var $step = $(step);
                var cls = "";
                var pos = parseInt($step.data('position'), 10);

                var $progressButton = $("" +
                    "<li data-position='" + $step.attr('data-position') + "'><a href='#'><h1>" + $step.data('position') + ". </h1>" + $step.find('h1').html() + "</a></li>" +
                    "");

                if ($step.hasClass("active") && settings.aiiaWizard.progressButtons.markActive) {
                    $progressButton.removeClass('default');
                    $progressButton.addClass('active');
                }

                $progressButton.css(settings.aiiaWizard.progressButtons.css);

                $progessButtonsWrapper.find(".aiia-wizard-progress-buttons-placeholder").append($progressButton);

            });

            return $progessButtonsWrapper
        }

        function getProgressButtonsBorderBottomTemplate(settings) {

            var $hr = $("<hr/>");

            $hr.css(settings.aiiaWizard.progressButtons.borderBottom.css);

            return $hr;

        }

        function getStepTitleTemplate(i, $step, settings) {

            var stepNumber = i + 1;
            var $stepTitle = $step.find("h1");
            var stepTitleText = $stepTitle.html();

            var $stepNumber = $("<h1 class='pull-left'>" + stepNumber + "</h1>");
            var $stepText = $("<span>" + stepTitleText + "</span>")
            $stepTitle.remove();

            var $newStepTitle = $("" +
                "<div class='row aiia-wizard-step-title'>" +
                "<div class='col-md-12'>" +
                "<span class='aiia-wizard-step-title-number'>" + stepNumber + "</span>" +
                "<span class='aiia-wizard-step-title-text'>" + stepTitleText + "</span>" +
                "</div>" +
                "</div>" +
                "" +
                "");

            $newStepTitle.find(".aiia-wizard-step-title-number").css(settings.aiiaWizard.steps.title.number.css);
            $newStepTitle.find(".aiia-wizard-step-title-text").css(settings.aiiaWizard.steps.title.text.css);

            return $newStepTitle;
        }

        function moveStepLeft($s) {
            $s.css({
                'margin-left': '-100%'  // move all lower steps to the left
            });
        }

        function moveStepRight($s) {
            $s.css({
                'margin-left': '100%'  // move all lower steps to the left
            });
        }

        function showStep($s) {
            $s.css({
                'margin-left': 0
            });
        }

        function getActiveElementPosition($pluginElement) {
            var stringResult = $pluginElement
                .find(".aiia-wizard-steps-wrapper")
                .find(".active").data('position');

            return parseInt(stringResult, 10);
        }

        function countElements($pluginElement) {
            return $pluginElement.find(".aiia-wizard-step").length;
        }

        function setFinishButton($pluginElement, text) {
            var $finishButton = $pluginElement.find(".aiia-wizard-button-next");

            var txt = $pluginElement.data('aiiaWizard').settings.aiiaWizard.localization.buttons.finish;
            if (text)
                txt = text;

            $finishButton.css(settings.aiiaWizard.buttons.finish.text.css);

            $finishButton
                .removeClass('btn-primary')
                .addClass('btn-success')
                .html(txt);
        }

        function unsetFinishButton($pluginElement, settings) {
            var $finishButton = $pluginElement.find(".aiia-wizard-button-next");
            var txt = $pluginElement.data('aiiaWizard').settings.aiiaWizard.localization.buttons.next;
            var $iconNext = $("<span class='glyphicon glyphicon-chevron-right pull-right'></span>");
            var $iconNextText = $("<span>" + settings.aiiaWizard.localization.buttons.next + "</span>");
            $iconNext.css(settings.aiiaWizard.buttons.next.icon.css);

            $iconNextText.css(settings.aiiaWizard.buttons.next.text.css);

            $finishButton
                .removeClass('btn-success')
                .addClass('btn-primary')
                .html("")
                .append($iconNextText)
            //.append($iconNext)
        }

        function markStepAsCompleted(activeElementPosition, $plugin, settings) {

            $plugin.find("[data-position='" + (activeElementPosition - 1) + "']").addClass("completed");


            // find the target progressButton to mark as completed
            var $progressButton = $plugin.find(".aiia-wizard-progress-buttons-placeholder").find("[data-position='" + (activeElementPosition - 1) + "']");

            // create a new success icon to place it on the progress button
            var $successIcon = $("<span class='" + settings.aiiaWizard.progressButtons.completed.icon.cssClass + " aiia-wizard-icon-step-completed'></span>")
                .css(settings.aiiaWizard.progressButtons.completed.icon.css);

            var $a = $progressButton.find("a");
            // When the step is completed, the progress button must show it with a new style (gray by default)...
            $a.css(settings.aiiaWizard.progressButtons.completed.css);
            // ...and with a success icon appended.
            $a.append($successIcon);
        }

        function unmarkStepAsCompleted(activeElementPosition, $plugin) {

            var $progressButton = $plugin.find(".aiia-wizard-progress-buttons-placeholder").find("[data-position='" + activeElementPosition + "']");
            $progressButton.find(".aiia-wizard-icon-step-completed").remove();
            var $a = $progressButton.find("a");
            $a.removeAttr("style");
        }

        function previous($plugin, goToFirst) {
            var settings = $plugin.data('aiiaWizard').settings;
            var $elementToSlide = $plugin.find(".aiia-wizard-steps-wrapper .active");
            var activeStep = parseInt($plugin.find(".aiia-wizard-steps-wrapper .active").attr("data-position"), 10);
            if (activeStep > 0) {
                slideRight($elementToSlide, settings, $plugin, goToFirst);
            }
        }


        ////////////////////////////////////////// Plugin definition

        $.fn.aiiaWizard = function (method) {

            if (pub[method]) {
                return pub[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else if (typeof method === 'object' || !method) {
                return pub.init.apply(this, arguments);
            } else {
                $.error('Method ' + method + ' does not exist on jQuery.aiiaWizard');
            }

        };

        ////////////////////////////////////////// Plugin Options

        $.fn.aiiaWizard.defaults = {
            aiiaWizard: {
                minHeight: 400,
                activeStep: 1,
                localization: {
                    buttons: {
                        next: 'Next',
                        previous: 'Previous',
                        finish: 'Finish',
                        loading: 'Loading...'
                    }
                },
                progressButtons: {
                    borderBottom: {
                        css: {
                            'border-width': '4px',
                            'border-color': '#E6E6E6'
                        }
                    },
                    css: {
                        'padding': '0 43px',

                    },
                    markActive: false,
                    completed: {
                        css: {
                            'background-color': '#E6E6E6'
                        },
                        icon: {
                            cssClass: 'glyphicon glyphicon-ok-sign',
                            css: {
                                'position': 'absolute',
                                'top': '-20px',
                                'right': '-17px',
                                'font-size': '4em',
                                'color': 'green'
                            }
                        }
                    }

                },
                steps: {
                    title: {
                        number: {
                            css: {
                                'background-color': '#E6E6E6',
                                '-webkit-border-radius': '300px',
                                '-moz-border-radius': '300px',
                                'border-radius': '300px',
                                'color': '#FFFFFF',
                                'float': 'left',
                                'font-size': '36px',
                                'height': '70px',
                                'margin-right': '10px',
                                'text-align': 'center',
                                'width': '70px',
                                'font-weight': 'bold',
                                'padding-top': '8px'
                            }
                        },
                        text: {
                            css: {
                                'color': '#158CBA',
                                'font-size': '36px',
                                'float': 'left',
                                'font-size': '36px',
                                'margin-top': '8px'
                            }
                        }
                    },
                    content: {

                    }
                },
                buttons: {
                    previous: {
                        text: {
                            css: {
                                //'float': 'right',
                                //'font-size': '14px',
                                //'margin-top': '2px',
                                //'margin-left': '7px'
                            }
                        },
                        icon: {
                            css: {
                                //'font-size': '24px'
                            }
                        }

                    },
                    next: {
                        text: {
                            css: {
                                //'float': 'left',
                                //'font-size': '14px',
                                //'margin-top': '2px',
                                //'margin-right': '7px'
                            }
                        },
                        icon: {
                            css: {
                                //'font-size': '14px'
                            }
                        }
                    },
                    'css': {
                        //'padding-bottom': '10px'
                    },
                    finish: {
                        text: {
                            css: {
                                //'font-size': '20px',
                                //'float': 'left',
                                //'font-size': '20px',
                                //'margin-top': '2px',
                                //'margin-right': '7px'
                            }
                        }
                    },
                    'css': {
                        //'padding-bottom': '10px'
                    }

                }
            }
        };

    })( jQuery, window, document );

