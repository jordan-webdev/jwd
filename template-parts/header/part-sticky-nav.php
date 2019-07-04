.sticky-nav {
  position: fixed;
  top: 0;
  left: -999rem;
  right: 0;
  width: 100%;
  background-color: $color__white;
  opacity: 0;
  transition: opacity .3s, left 0s .3s;
  padding-top: rem(12);
  padding-bottom: rem(12);
  z-index: $z-sticky;
  display: none;

  @media screen and (min-width: $breakpoint__mobile-menu) {
    display: block;
  }

  &.active {
    left: 0;
    opacity: 1;
    transition: opacity .5s, left 0s;
  }

  .layout {
    @include flexbox;
    @include justify-content(space-between);
    @include align-items(center);
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
  }

  .list {
    @include flexbox;
  }

  .item {
    margin-right: 25px;
    color: #000;
    font-family: $font__secondary;
    font-size: 17px;
    letter-spacing: .1px;

    &:last-child {
      margin-right: 0;
    }
  }
}
