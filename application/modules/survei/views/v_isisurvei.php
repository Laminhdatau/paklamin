<style>
    .wizard_verticle ul.wizard_steps li a.done::before,
    .wizard_verticle ul.wizard_steps li a.done .step_no {
        background: #FFA600;
        color: #fff;
    }

    .wizard_verticle ul.wizard_steps {
        display: table;
        list-style: none;
        position: relative;
        width: 20%;
        float: left;
        margin: 0 0 20px;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <form class="form-horizontal form-label-left" action="<?= base_url('survei/prosesSurvei'); ?>" id="kuesioner" method="post">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pengisian Kuisioner <small><b> <?= $nama = str_replace("%20", " ", $nama); ?></b></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content col-md-12 col-sm-12 col-xs-12">
                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                        <ul class="list-unstyled wizard_steps anchor">
                            <li>
                                <a href="#step-1" class="selected" isdone="1" rel="1">
                                    <span class="step_no">1</span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2" class="disabled" isdone="0" rel="2">
                                    <span class="step_no">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3" class="disabled" isdone="0" rel="3">
                                    <span class="step_no">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-4" class="disabled" isdone="0" rel="4">
                                    <span class="step_no">4</span>
                                </a>
                            </li>
                        </ul>
                        <input type="hidden" value="<?= $id_jenis; ?>" name="id_jenis" id="id_jenis">
                        <input type="hidden" value="<?= $kd; ?>" name="kd_dosen" id="kd_dosen">
                        <input type="hidden" value="<?= $kd_mk; ?>" name="kd_mata_kuliah" id="kd_mata_kuliah">
                        <div id="step-1" class="content" style="display: block;">
                            <h2 class="soal1" style="background-color: #FFA600; color: #fff; width: 95%; height:5%;padding: 5px;"><b><?php echo $bagian1['bagian_soal']; ?></b></h2>
                            <table>

                                <?php $ns = 0;
                                foreach ($soal1 as $s) {
                                    $ns++; ?>
                                    <tr>
                                        <td width="100%">
                                            <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                            <input type="hidden" value="<?= $s->id_soal; ?>" name="soal1[<?= $ns; ?>]" id="soal1[<?= $ns; ?>]">
                                        </td>
                                    </tr>
                                    <tr>
                                        <table>
                                            <tr>

                                                <td width="15%"></td>
                                                <td>
                                                    <?php
                                                    foreach ($option1 as $o) {
                                                    ?>
                                                        <h4>

                                                            <input type="radio" value="<?= $o->id_jawaban; ?>" name="option1[<?= $ns; ?>]" id="option1[<?= $ns ?>]" required>
                                                            <?= " " . $o->jawaban; ?>
                                                        </h4>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div id="step-2" class="content" style="display: none;">
                            <h2 class="soal2" style="background-color: #FFA600; color: #fff;width: 95%;height:5%;padding: 5px;"><b><?php echo $bagian2['bagian_soal']; ?></b></h2>
                            <table>

                                <?php $ns = 0;
                                foreach ($soal2 as $s) {
                                    $ns++; ?>
                                    <tr>
                                        <td width="100%">
                                            <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                            <input type="hidden" value="<?= $s->id_soal; ?>" name="soal2[<?= $ns; ?>]" id="soal2[<?= $ns; ?>]">
                                        </td>
                                    </tr>
                                    <tr>
                                        <table>
                                            <tr>

                                                <td width="15%"></td>
                                                <td>
                                                    <?php
                                                    foreach ($option2 as $o) {
                                                    ?>
                                                        <h4>
                                                            <input type="radio" value="<?= $o->id_jawaban; ?>" name="option2[<?= $ns; ?>]" id="option2[<?= $ns ?>]" required>

                                                            <?= " " . $o->jawaban; ?>
                                                        </h4>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </tr>
                                <?php } ?>
                            </table>
                            <!-- </form> -->
                        </div>
                        <div id="step-3" class="content" style="display: none;">
                            <h2 class="soal3" style="background-color: #FFA600; color: #fff;width: 95%;height:5%;padding: 5px;"><b><?php echo $bagian3['bagian_soal']; ?></b></h2>
                            <table>
                                <?php $ns = 0;
                                foreach ($soal3 as $s) {
                                    $ns++; ?>
                                    <tr>
                                        <td width="100%">
                                            <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                            <input type="hidden" value="<?= $s->id_soal; ?>" name="soal3[<?= $ns; ?>]" id="soal3[<?= $ns; ?>]">
                                        </td>
                                    </tr>
                                    <tr>
                                        <table>
                                            <tr>

                                                <td width="15%"></td>
                                                <td>
                                                    <?php
                                                    foreach ($option3 as $o) {
                                                    ?>
                                                        <h4>
                                                            <input type="radio" value="<?= $o->id_jawaban; ?>" name="option3[<?= $ns; ?>]" id="option3[<?= $ns ?>]" required>
                                                            <?= " " . $o->jawaban; ?>
                                                        </h4>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div id="step-4" class="content" style="display: none;">
                            <h2 class="kritiksaran" style="background-color: #FFA600; color: #fff;width: 95%;height:5%;padding: 5px;"><b>Kritik dan Saran</b></h2>
                            <div class="x_content">
                                <div id="alerts">Silahkan Deskripsikan/Berikan Masukan Anda</div>
                                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                    <div class="btn-group">
                                        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-info" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                    </div>
                                </div>
                                <textarea name="komentar" id="komentar" class="editor-wrapper placeholderText col-md-8" contenteditable="true"></textarea>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    /*
     * SmartWizard 3.3.1 plugin
     * jQuery Wizard control Plugin
     * by Dipu
     *
     * Refactored and extended:
     * https://github.com/mstratman/jQuery-Smart-Wizard
     *
     * Original URLs:
     * http://www.techlaboratory.net
     * http://tech-laboratory.blogspot.com
     */

    function SmartWizard(target, options) {
        this.target = target;
        this.options = options;
        this.curStepIdx = options.selected;
        this.steps = $(target).children("ul").children("li").children("a"); // Get all anchors
        this.contentWidth = 0;
        // this.msgBox = $('<div class="msgBox"><div class="content"></div><a href="#" class="close">X</a></div>');
        this.elmStepContainer = $('<div></div>').addClass("stepContainer").attr("style", "height: 400px;");
        this.buttons = {
            next: $('<button>' + options.labelNext + '</button>').addClass("buttonNext"),
            previous: $('<button>' + options.labelPrevious + '</button>').addClass("buttonPrevious"),
            finish: $('<button>' + options.labelFinish + '</button>').attr("type", "submit").addClass("buttonFinish")
        };

        /*
         * Private functions
         */

        var _init = function($this) {
            var elmActionBar = $('<div></div>').addClass("actionBar");
            elmActionBar.append($this.msgBox);
            $('.close', $this.msgBox).click(function() {
                $this.msgBox.fadeOut("normal");
                return false;
            });

            var allDivs = $this.target.children('div');
            $this.target.children('ul').addClass("anchor");
            allDivs.addClass("content");

            // highlight steps with errors
            if ($this.options.errorSteps && $this.options.errorSteps.length > 0) {
                $.each($this.options.errorSteps, function(i, n) {
                    $this.setError({
                        stepnum: n,
                        iserror: true
                    });
                });
            }

            $this.elmStepContainer.append(allDivs);
            elmActionBar.append($this.loader);
            $this.target.append($this.elmStepContainer);
            elmActionBar.append($this.buttons.previous)
                .append($this.buttons.next)
                .append($this.buttons.finish);
            $this.target.append(elmActionBar);
            this.contentWidth = $this.elmStepContainer.width();

            $($this.buttons.next).click(function() {
                $this.goForward();
                return false;
            });
            $($this.buttons.previous).click(function() {
                $this.goBackward();
                return false;
            });
            $($this.buttons.finish).click(function() {
                if (!$(this).hasClass('buttonDisabled')) {
                    if ($.isFunction($this.options.onFinish)) {
                        var context = {
                            fromStep: $this.curStepIdx + 1
                        };
                        if (!$this.options.onFinish.call(this, $($this.steps), context)) {
                            return false;
                        }
                    } else {
                        var frm = $this.target.parents('form');
                        if (frm && frm.length) {
                            frm.submit();
                        }
                    }
                }
                return false;
            });

            $($this.steps).bind("click", function(e) {
                if ($this.steps.index(this) == $this.curStepIdx) {
                    return false;
                }
                var nextStepIdx = $this.steps.index(this);
                var isDone = $this.steps.eq(nextStepIdx).attr("isDone") - 0;
                if (isDone == 1) {
                    _loadContent($this, nextStepIdx);
                }
                return false;
            });

            // Enable keyboard navigation
            if ($this.options.keyNavigation) {
                $(document).keyup(function(e) {
                    if (e.which == 39) { // Right Arrow
                        $this.goForward();
                    } else if (e.which == 37) { // Left Arrow
                        $this.goBackward();
                    }
                });
            }
            //  Prepare the steps
            _prepareSteps($this);
            // Show the first slected step
            _loadContent($this, $this.curStepIdx);
        };

        var _prepareSteps = function($this) {
            if (!$this.options.enableAllSteps) {
                $($this.steps, $this.target).removeClass("selected").removeClass("done").addClass("disabled");
                $($this.steps, $this.target).attr("isDone", 0);
            } else {
                $($this.steps, $this.target).removeClass("selected").removeClass("disabled").addClass("done");
                $($this.steps, $this.target).attr("isDone", 1);
            }

            $($this.steps, $this.target).each(function(i) {
                $($(this).attr("href"), $this.target).hide();
                $(this).attr("rel", i + 1);
            });
        };

        var _step = function($this, selStep) {
            return $(
                $(selStep, $this.target).attr("href"),
                $this.target
            );
        };

        var _loadContent = function($this, stepIdx) {
            var selStep = $this.steps.eq(stepIdx);
            var ajaxurl = $this.options.contentURL;
            var ajaxurl_data = $this.options.contentURLData;
            var hasContent = selStep.data('hasContent');
            var stepNum = stepIdx + 1;
            if (ajaxurl && ajaxurl.length > 0) {
                if ($this.options.contentCache && hasContent) {
                    _showStep($this, stepIdx);
                } else {
                    var ajax_args = {
                        url: ajaxurl,
                        type: "POST",
                        data: ({
                            step_number: stepNum
                        }),
                        dataType: "text",
                        beforeSend: function() {
                            $this.loader.show();
                        },
                        error: function() {
                            $this.loader.hide();
                        },
                        success: function(res) {
                            $this.loader.hide();
                            if (res && res.length > 0) {
                                selStep.data('hasContent', true);
                                _step($this, selStep).html(res);
                                _showStep($this, stepIdx);
                            }
                        }
                    };
                    if (ajaxurl_data) {
                        ajax_args = $.extend(ajax_args, ajaxurl_data(stepNum));
                    }
                    $.ajax(ajax_args);
                }
            } else {
                _showStep($this, stepIdx);
            }
        };

        var _showStep = function($this, stepIdx) {
            var selStep = $this.steps.eq(stepIdx);
            var curStep = $this.steps.eq($this.curStepIdx);
            if (stepIdx != $this.curStepIdx) {
                if ($.isFunction($this.options.onLeaveStep)) {
                    var context = {
                        fromStep: $this.curStepIdx + 1,
                        toStep: stepIdx + 1
                    };
                    if (!$this.options.onLeaveStep.call($this, $(curStep), context)) {
                        return false;
                    }
                }
            }
            $this.elmStepContainer.height(_step($this, selStep).outerHeight());
            var prevCurStepIdx = $this.curStepIdx;
            $this.curStepIdx = stepIdx;
            if ($this.options.transitionEffect == 'slide') {
                _step($this, curStep).slideUp("fast", function(e) {
                    _step($this, selStep).slideDown("fast");
                    _setupStep($this, curStep, selStep);
                });
            } else if ($this.options.transitionEffect == 'fade') {
                _step($this, curStep).fadeOut("fast", function(e) {
                    _step($this, selStep).fadeIn("fast");
                    _setupStep($this, curStep, selStep);
                });
            } else if ($this.options.transitionEffect == 'slideleft') {
                var nextElmLeft = 0;
                var nextElmLeft1 = null;
                var nextElmLeft = null;
                var curElementLeft = 0;
                if (stepIdx > prevCurStepIdx) {
                    nextElmLeft1 = $this.contentWidth + 10;
                    nextElmLeft2 = 0;
                    curElementLeft = 0 - _step($this, curStep).outerWidth();
                } else {
                    nextElmLeft1 = 0 - _step($this, selStep).outerWidth() + 20;
                    nextElmLeft2 = 0;
                    curElementLeft = 10 + _step($this, curStep).outerWidth();
                }
                if (stepIdx == prevCurStepIdx) {
                    nextElmLeft1 = $($(selStep, $this.target).attr("href"), $this.target).outerWidth() + 20;
                    nextElmLeft2 = 0;
                    curElementLeft = 0 - $($(curStep, $this.target).attr("href"), $this.target).outerWidth();
                } else {
                    $($(curStep, $this.target).attr("href"), $this.target).animate({
                        left: curElementLeft
                    }, "fast", function(e) {
                        $($(curStep, $this.target).attr("href"), $this.target).hide();
                    });
                }

                _step($this, selStep).css("left", nextElmLeft1).show().animate({
                    left: nextElmLeft2
                }, "fast", function(e) {
                    _setupStep($this, curStep, selStep);
                });
            } else {
                _step($this, curStep).hide();
                _step($this, selStep).show();
                _setupStep($this, curStep, selStep);
            }
            return true;
        };

        var _setupStep = function($this, curStep, selStep) {
            $(curStep, $this.target).removeClass("selected");
            $(curStep, $this.target).addClass("done");

            $(selStep, $this.target).removeClass("disabled");
            $(selStep, $this.target).removeClass("done");
            $(selStep, $this.target).addClass("selected");

            $(selStep, $this.target).attr("isDone", 1);

            _adjustButton($this);

            if ($.isFunction($this.options.onShowStep)) {
                var context = {
                    fromStep: parseInt($(curStep).attr('rel')),
                    toStep: parseInt($(selStep).attr('rel'))
                };
                if (!$this.options.onShowStep.call(this, $(selStep), context)) {
                    return false;
                }
            }
            if ($this.options.noForwardJumping) {
                // +2 == +1 (for index to step num) +1 (for next step)
                for (var i = $this.curStepIdx + 2; i <= $this.steps.length; i++) {
                    $this.disableStep(i);
                }
            }
        };

        var _adjustButton = function($this) {
            if (!$this.options.cycleSteps) {
                if (0 >= $this.curStepIdx) {
                    $($this.buttons.previous).addClass("buttonDisabled");
                    if ($this.options.hideButtonsOnDisabled) {
                        $($this.buttons.previous).hide();
                    }
                } else {
                    $($this.buttons.previous).removeClass("buttonDisabled");
                    if ($this.options.hideButtonsOnDisabled) {
                        $($this.buttons.previous).show();
                    }
                }
                if (($this.steps.length - 1) <= $this.curStepIdx) {
                    $($this.buttons.next).addClass("buttonDisabled");
                    if ($this.options.hideButtonsOnDisabled) {
                        $($this.buttons.next).hide();
                    }
                } else {
                    $($this.buttons.next).removeClass("buttonDisabled");
                    if ($this.options.hideButtonsOnDisabled) {
                        $($this.buttons.next).show();
                    }
                }
            }
            // Finish Button
            if (!$this.steps.hasClass('disabled') || $this.options.enableFinishButton) {
                $($this.buttons.finish).removeClass("buttonDisabled");
                if ($this.options.hideButtonsOnDisabled) {
                    $($this.buttons.finish).show();
                }
            } else {
                $($this.buttons.finish).addClass("buttonDisabled");
                if ($this.options.hideButtonsOnDisabled) {
                    $($this.buttons.finish).hide();
                }
            }
        };

        /*
         * Public methods
         */

        SmartWizard.prototype.goForward = function() {
            var nextStepIdx = this.curStepIdx + 1;
            if (this.steps.length <= nextStepIdx) {
                if (!this.options.cycleSteps) {
                    return false;
                }
                nextStepIdx = 0;
            }
            _loadContent(this, nextStepIdx);
        };

        SmartWizard.prototype.goBackward = function() {
            var nextStepIdx = this.curStepIdx - 1;
            if (0 > nextStepIdx) {
                if (!this.options.cycleSteps) {
                    return false;
                }
                nextStepIdx = this.steps.length - 1;
            }
            _loadContent(this, nextStepIdx);
        };

        SmartWizard.prototype.goToStep = function(stepNum) {
            var stepIdx = stepNum - 1;
            if (stepIdx >= 0 && stepIdx < this.steps.length) {
                _loadContent(this, stepIdx);
            }
        };
        SmartWizard.prototype.enableStep = function(stepNum) {
            var stepIdx = stepNum - 1;
            if (stepIdx == this.curStepIdx || stepIdx < 0 || stepIdx >= this.steps.length) {
                return false;
            }
            var step = this.steps.eq(stepIdx);
            $(step, this.target).attr("isDone", 1);
            $(step, this.target).removeClass("disabled").removeClass("selected").addClass("done");
        }
        SmartWizard.prototype.disableStep = function(stepNum) {
            var stepIdx = stepNum - 1;
            if (stepIdx == this.curStepIdx || stepIdx < 0 || stepIdx >= this.steps.length) {
                return false;
            }
            var step = this.steps.eq(stepIdx);
            $(step, this.target).attr("isDone", 0);
            $(step, this.target).removeClass("done").removeClass("selected").addClass("disabled");
        }
        SmartWizard.prototype.currentStep = function() {
            return this.curStepIdx + 1;
        }

        SmartWizard.prototype.showMessage = function(msg) {
            $('.content', this.msgBox).html(msg);
            this.msgBox.show();
        }
        SmartWizard.prototype.hideMessage = function() {
            this.msgBox.fadeOut("normal");
        }
        SmartWizard.prototype.showError = function(stepnum) {
            this.setError(stepnum, true);
        }
        SmartWizard.prototype.hideError = function(stepnum) {
            this.setError(stepnum, false);
        }
        SmartWizard.prototype.setError = function(stepnum, iserror) {
            if (typeof stepnum == "object") {
                iserror = stepnum.iserror;
                stepnum = stepnum.stepnum;
            }

            if (iserror) {
                $(this.steps.eq(stepnum - 1), this.target).addClass('error')
            } else {
                $(this.steps.eq(stepnum - 1), this.target).removeClass("error");
            }
        }

        SmartWizard.prototype.fixHeight = function() {
            var height = 0;

            var selStep = this.steps.eq(this.curStepIdx);
            var stepContainer = _step(this, selStep);
            stepContainer.children().each(function() {
                height += $(this).outerHeight();
            });

            // These values (5 and 20) are experimentally chosen.
            stepContainer.height(height + 5);
            this.elmStepContainer.height(height + 20);
        }

        _init(this);
    };



    (function($) {

        $.fn.smartWizard = function(method) {
            var args = arguments;
            var rv = undefined;
            var allObjs = this.each(function() {
                var wiz = $(this).data('smartWizard');
                if (typeof method == 'object' || !method || !wiz) {
                    var options = $.extend({}, $.fn.smartWizard.defaults, method || {});
                    if (!wiz) {
                        wiz = new SmartWizard($(this), options);
                        $(this).data('smartWizard', wiz);
                    }
                } else {
                    if (typeof SmartWizard.prototype[method] == "function") {
                        rv = SmartWizard.prototype[method].apply(wiz, Array.prototype.slice.call(args, 1));
                        return rv;
                    } else {
                        $.error('Method ' + method + ' does not exist on jQuery.smartWizard');
                    }
                }
            });
            if (rv === undefined) {
                return allObjs;
            } else {
                return rv;
            }
        };

        // Default Properties and Events
        $.fn.smartWizard.defaults = {
            selected: 0, // Selected Step, 0 = first step
            keyNavigation: true, // Enable/Disable key navigation(left and right keys are used if enabled)
            enableAllSteps: false,
            transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
            contentURL: null, // content url, Enables Ajax content loading
            contentCache: true, // cache step contents, if false content is fetched always from ajax url
            cycleSteps: false, // cycle step navigation
            enableFinishButton: false, // make finish button enabled always
            hideButtonsOnDisabled: false, // when the previous/next/finish buttons are disabled, hide them instead?
            errorSteps: [], // Array Steps with errors
            labelPrevious: 'Kembali',
            labelNext: 'Next',
            labelFinish: 'Simpan',
            noForwardJumping: false,
            onLeaveStep: null, // triggers when leaving a step
            onShowStep: null, // triggers when showing a step
            onFinish: null // triggers when Finish button is clicked
        };

    })(jQuery);
</script>


<script>
    $('a[data-edit="bold"]').click(function(e) {
        e.preventDefault();
        document.execCommand('bold', false, null);
    });
</script>
<script>
    $('a[data-edit="italic"]').click(function(e) {
        e.preventDefault();
        document.execCommand('italic', false, null);
    });
    $('a[data-edit="insertunorderedlist"]').click(function(e) {
        e.preventDefault();
        document.execCommand('insertunorderedlist', false, null);
    });
    $('a[data-edit="insertorderedlist"]').click(function(e) {
        e.preventDefault();
        document.execCommand('insertorderedlist', false, null);
    });
    $('a[data-edit="outdent"]').click(function(e) {
        e.preventDefault();
        document.execCommand('outdent', false, null);
    });
    $('a[data-edit="indent"]').click(function(e) {
        e.preventDefault();
        document.execCommand('indent', false, null);
    });
    $('a[data-edit="justifyleft"]').click(function(e) {
        e.preventDefault();
        document.execCommand('justifyleft', false, null);
    });
    $('a[data-edit="justifycenter"]').click(function(e) {
        e.preventDefault();
        document.execCommand('justifycenter', false, null);
    });
    $('a[data-edit="justifyright"]').click(function(e) {
        e.preventDefault();
        document.execCommand('justifyright', false, null);
    });
    $('a[data-edit="justifyfull"]').click(function(e) {
        e.preventDefault();
        document.execCommand('justifyfull', false, null);
    });
    $('a[data-edit="undo"]').click(function(e) {
        e.preventDefault();
        document.execCommand('undo', false, null);
    });
    $('a[data-edit="redo"]').click(function(e) {
        e.preventDefault();
        document.execCommand('redo', false, null);
    });
</script>